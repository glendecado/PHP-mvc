<?php

namespace manage;

class Request
{
    ////GET
    static function get($key)
    {
        if ($_SERVER['REQUEST_METHOD'] === 'GET') {
            return $_GET[$key];
        } else {
            exit();
        }
    }

    static function setGet($key, $value)
    {
        if ($_SERVER['REQUEST_METHOD'] === 'GET') {
            $_GET[$key] = $value;
        } else {
            exit();
        }
    }

    static function urlGet($key)
    {
        $url = isset($_GET[$key]) ? urlencode($_GET[$key]) : null;
        return '?' . $key . '=' . $url;
    }

    static function dumpGet()
    {
        echo '<pre>';
        var_dump($_GET);
        echo '</pre>';
    }

    //Post
    static function post($key)
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            return $_POST[$key];
        } else {
            exit();
        }
    }

    static function setPost($key, $value)
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $_POST[$key] = $value;
        } else {
            exit();
        }
    }

    static function dumpPost()
    {
        echo '<pre>';
        var_dump($_POST);
        echo '</pre>';
    }
}
