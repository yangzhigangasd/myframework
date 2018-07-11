<?php
namespace  core\lib;

class Route
{
    private $option = array();
    private $config;
    public static $module;
    public static $controller;
    public static $action;

    public function __construct()
    {
        $this->config = \core\lib\Config::all('route');
        $this->getOption();
        $this->getMethod();
        $this->getController();
        $this->getAction();
        $this->setRequest();
    }

    private function getMethod()
    {
        if (isset($this->option[0])) {
            if (in_array($this->option[0], $this->config['MODULES'])) {
                self::$module = strtolower($this->option[0]);
                array_shift($this->option);
                return;
            }
        }
        self::$module = $this->config['DEFAULT_MODULE'];
    }

    private function setRequest()
    {
        if ($this->option) {
            $_GET = $_GET ? $_GET : array();
            $key = $value = '';
            foreach ($this->option as $k => $v) {
                if ($k / 2 == 0) {
                    $key = $v;
                } else {
                    $value = $v;
                    $_GET[$key] = $value;
                }
            }
        }
    }

    private function getController()
    {
        self::$controller = ucfirst(isset($this->option[0]) ? strtolower($this->option[0]) : $this->config['DEFAULT_CONTROLLER']) . 'Controller';
        array_shift($this->option);
    }

    private function getAction()
    {
        self::$action = isset($this->option[0]) ? strtolower($this->option[0]) : $this->config['DEFAULT_ACTION'];
        array_shift($this->option);
    }

    private function getOption()
    {
        $uri = isset($_SERVER['REQUEST_URI']) ? trim($_SERVER['REQUEST_URI'], '/') : '';
        if (empty($uri))
            return;

        $uri = preg_replace(array('/\/$/', '/^\?index.php/'), array('', ''), $uri);

        if ($uri) {
            $this->option = explode('/', $uri);
        }
    }
}