<?php
namespace core\lib;

use Medoo\Medoo;

class Model extends Medoo
{
    public function __construct()
    {
        $config = Config::all('database');
        parent::__construct($config);
    }
}