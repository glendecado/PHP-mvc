<?php


namespace mvc;



use manage\Request;
use manage\Session;
use mvc\Model;
use mvc\User;

class Controller
{
    static function insert()
    {
        Request::dumpPost();
        $m = new User;
        $m->create([Request::post('email'), Request::post('username'), Request::post('password')]);
    }

    static function view()
    {
        include('./Views/index.php');
    }
}







///////////////////////////////////////////////////
!defined('MY_APP') ? header('location: ../') : '';
