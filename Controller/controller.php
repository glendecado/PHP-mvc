<?php


namespace mvc;

include(__DIR__ . '/../App/urlProtection.php');



use manage\Request;
use manage\Session;
use mvc\Model;
use mvc\User;

class Controller
{

    private $m;
    function __construct()
    {
        $this->m = new User;
    }
    function insert()
    {
        $this->m->create([Request::post('email'), Request::post('username'), password_hash(Request::post('password'), PASSWORD_DEFAULT)]);

        header('location: /');
    }

    function delete()
    {

        $this->m->delete('ID', Request::post('id'));


        header('location: /');
    }

    function search()
    {
        $search = $this->m->viewBy('ID', Request::get('id'));



        var_dump($search);
    }
    function view()
    {
        $data = $this->m->viewAll();


        include('./Views/main.php');
    }
}
