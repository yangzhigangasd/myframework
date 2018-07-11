<?php
namespace core\lib\dirve\log;

use core\lib\Config;

class File
{
    private $path;

    public function __construct()
    {
        $config = Config::get('OPTION', 'log');
        $this->path = $config['PATH'];
    }

    public function write($name, $file)
    {
        $path = $this->path . date('Ymd');

        if (empty(is_dir($path))) {
            mkdir($path, 0777, true);
        }

        file_put_contents($path . '/' . $file . '.log', $name . '  ' . date('Y-m-d H:i:s') . PHP_EOL, FILE_APPEND);
    }
}