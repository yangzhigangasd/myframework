<?php
namespace core\lib;

class Controller
{
    protected $assign = array();

    public function assign($key, $data)
    {
        $this->assign[$key] = $data;
    }

    public function display($file)
    {
        $path = APP . '/' . Route::$module . '/views/' . $file . '.html';
        if (empty(is_file($path))) {
            throw new \Exception('视图文件不存在'.$path);
        }
        extract($this->assign);
        include $path;
    }
}