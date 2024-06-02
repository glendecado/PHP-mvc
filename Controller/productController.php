<?php


namespace mvc;

include(__DIR__ . '/../App/urlProtection.php');



use manage\Request;
use manage\Session;
use mvc\Model;
use mvc\product;

class productController
{

    private $model;

    function __construct()
    {
        $this->model = new product();
    } 
        
}