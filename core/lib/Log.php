<?php
namespace core\lib;

class Log
{
    private static $log;

    public static function init()
    {
        $driver = Config::get('DRIVER', 'log');
        $className = '\\core\\lib\\dirve\\log\\' . ucfirst($driver);
        self::$log = new $className;
    }

    public static function write($name, $file)
    {
        self::$log->write($name, $file);
    }
}