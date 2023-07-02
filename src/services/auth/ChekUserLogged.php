<?php

namespace SFinan\Services\Auth;

trait CheckUserLogged
{
    public function check() : void
    {
        if (!self::has('user')) {
            header('Location: /auth/login');
            exit();
        }
    }
}
