<?php
namespace app\home\models;

use core\lib\Model;

class UserModel extends Model
{
    private $table = 'user';

    public function getAll()
    {
        return $this->select($this->table, '*');
    }
}