<?php
namespace app\home\controllers;

use app\home\models\UserModel;
use core\lib\Controller;
use core\lib\Log;

class IndexController extends Controller
{
    public function index()
    {
//        Log::write('hello world', 'index');

        $userModel = new UserModel();
        dump($userModel->getAll());

        $this->assign('data', 'hello world');
        $this->display('index');
    }
}