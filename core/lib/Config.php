<?php
namespace core\lib;

class Config
{
    private static $config;
    public static function get($name, $file)
    {
        self::load($file);
        if (empty(self::$config[$file][$name])) {
            throw  new \Exception($file . '配置项不存在' . $name);
        }
        return self::$config[$file][$name];
    }

    public static function all($file)
    {
        self::load($file);
        return self::$config[$file];
    }

    private static function load($file)
    {
        $path = CORE . '/config/' . $file . '.php';
        if (empty(is_file($path))) {
            throw new \Exception('文件不存在' . $file);
        }
        if (empty(self::$config[$file])) {
            self::$config[$file] = include $path;
        }
    }
}