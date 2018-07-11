<?php 
define('BASE', __DIR__);
define('CORE', BASE . '/core');
define('APP', BASE . '/app');
define('DEBUG', true);

require_once(BASE . '/vendor/autoload.php');
require_once(CORE . '/App.php');

//设置错误等级
if (DEBUG) {
    $whoops = new \Whoops\Run;
    $option = new \Whoops\Handler\PrettyPageHandler;
    $option->setPageTitle('错误');
    $whoops->pushHandler($option);
    $whoops->register();
    ini_set('display_errors', 'On');
} else {
    ini_set('display_errors', 'Off');
}

//自动加载
spl_autoload_register('\core\App::autoload');

//开始
\core\App::run();

