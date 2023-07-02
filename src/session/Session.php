<?php

namespace SFinan\Session;

class Session
{
    public static function sessionStart()
    {
        if (session_status() !== PHP_SESSION_ACTIVE) {
            session_start();
        }
    }

    public static function add($key, $value)
    {
        self::sessionStart();
        $_SESSION[$key] = $value;
    }


    public static function remove($key)
    {
        self::sessionStart();
        if(isset($_SESSION[$key]))
            unset($_SESSION[$key]);
    }

    public static function has($key) : bool
    {
        return isset($_SESSION[$key]);
    }
}
