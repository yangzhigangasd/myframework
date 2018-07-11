<?php
namespace app\home\controllers;

use core\lib\Controller;

class IndexController extends Controller
{
    public function index()
    {
        $this->assign('data', 'hello world');
        $this->display('index');
    }
}