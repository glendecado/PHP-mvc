<?php

namespace mvc;

include(__DIR__ . '/../App/urlProtection.php');

use mvc\Model;

class user extends Model
{

    protected $entity = 'user';
    protected $attributes = ['ID'=>'INTEGER PRIMARY KEY', 'email'=>'text', 'Username'=>'text', 'password'=>'text'];
}