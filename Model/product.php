<?php

namespace mvc;

include(__DIR__ . '/../App/urlProtection.php');

use mvc\Model;

class product extends Model
{

    protected $entity = 'product';
    protected $attributes = ['item'=>'text', 'description'=>'text'];
}