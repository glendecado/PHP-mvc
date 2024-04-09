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
        echo "<script>alert('heey')</script>";
        $this->m->delete('ID', Request::post('id'));

        sleep(10);
        header('location: /');
    }

    function search()
    {
        $search = $this->m->viewBy('ID', Request::get('id'));

        $value = json_decode($search, true);

        var_dump($value);
    }
    function view()
    {
        $view = $this->m->viewAll();
        $value = json_decode($view, true);

        include('./Views/main.php');
    }
}
