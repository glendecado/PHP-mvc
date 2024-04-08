<?php

namespace manage;

class Session
{
    static function start()
    {
        session_start();
    }

    static function set($key, $value)
    {
        $_SESSION[$key] = $value;
    }

    static function get($key)
    {
        return isset($_SESSION[$key]) ? $_SESSION[$key] : null;
    }

    static function destroy()
    {
        session_unset();
        session_destroy();
    }

    static function dumpSession()
    {
        echo '<pre>';
        var_dump($_SESSION);
        echo '</pre>';
    }
}
