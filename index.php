<?php 
define('BASE', __DIR__);
define('CORE', BASE . '/core');
define('APP', BASE . '/app');
define('DEBUG', true);

require_once(CORE . '/App.php');

//自动加载
spl_autoload_register('\core\App::autoload');


//开始
\core\App::run();