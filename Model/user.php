<?php

namespace mvc;

use mvc\Model;

class User extends Model
{

    protected $entity = 'User';
    protected $attributes = [
        'ID' => 'INTEGER PRIMARY KEY',
        'email' => 'text',
        'username' => 'text',
        'password' => 'text',
    ];
}