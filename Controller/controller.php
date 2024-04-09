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
        Request::dumpPost();

        $this->m->create([Request::post('email'), Request::post('username'), password_hash(Request::post('password'), PASSWORD_DEFAULT)]);
    }

    function delete()
    {

        $this->m->delete('ID', Request::post('id'));
    }

    function search()
    {
        $search = $this->m->searchFor('ID', Request::get('id'));

        $value = json_decode($search, true);

        var_dump($value);
    }
    function view()
    {
        include('./Views/main.php');
    }
}
