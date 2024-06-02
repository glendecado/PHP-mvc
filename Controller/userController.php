<?php


namespace mvc;

include(__DIR__ . '/../App/urlProtection.php');



use manage\Request;
use manage\Session;
use mvc\Model;
use mvc\user;

class userController
{

    private $model;

    function __construct()
    {
        $this->model = new user();
    } 
        
}