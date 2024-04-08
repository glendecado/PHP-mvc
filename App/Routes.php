<?php

namespace web;

class Routes
{
    static $route = [];

    static function add($key, $value)
    {
        self::$route[$key] = $value;
    }

    static function viewRoutes()
    {
        print_r(self::$route);
    }
    static function start()
    {
        $path = $_SERVER['REQUEST_URI'];

        // Check if the route exists
        //Check if the current $_SERVER['REQUEST_URI'] in in $this->routes
        if (array_key_exists($path, self::$route)) {
            if (is_callable(self::$route[$path])) {
                self::$route[$path]();
                exit();
            } else {
                include self::$route[$path];
                exit();
            }
        } else {
            header('location: 404.php');
            exit();
        }
    }
}




//////////////////////////////////////////////////////////////////////////////////////////////////////
!defined('MY_APP') ? header('location: ../') : '';
