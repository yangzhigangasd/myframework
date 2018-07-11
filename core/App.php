<?php
namespace core;

use core\lib\Route;

class App
{
	private static $class = [];

    /**
     *
     */
    public static function run()
    {
        //加载路由类
        $route = new Route();

        //加载控制器
        $class = '\\app\\' . Route::$module . '\\controllers\\' . Route::$controller;

        $controller = new $class;

        if (empty(method_exists($controller, $route::$action))) {
            throw new \Exception($route::$controller . '控制器方法不存'.$route::$action);
        }
        $controller->{Route::$action}();
    }

    /**
     * @param $class
     * @return bool
     * @throws \Exception
     */
    public static function autoload($class)
    {
        $class = str_replace('\\', '/', $class);
        $path = BASE . '/' . $class . '.php';
        
        if (!empty(is_file($path))) {
        	if (empty(self::$class[$class])) {
        		include $path;
        		self::$class[$class] = $class;
        	} else {
        		return true;
        	}
        } else {
        	throw new \Exception('文件不存在' . $path . PHP_EOL);
        }
    }
}