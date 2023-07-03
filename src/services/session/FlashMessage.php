<?php

namespace SFinan\Services\Session;

class FlashMessage
{
    public static function add($key, $value)
    {
        Session::add($key, $value);
    }

    public static function remove($key)
    {
        Session::remove($key);
    }

    public static function has($key) : bool
    {
        return Session::has($key);
    }

    public static function get($key)
    {
        $value = Session::get($key);
        Session::remove($key);
        return $value;
    }
}
