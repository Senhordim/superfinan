<?php

namespace SFinan\Services\Auth;

use SFinan\Services\Session\Session;

trait CheckUserLogged
{
    public function check() : void
    {
        if (!Session::has('user')){
            header('Location: /auth/login');
        }
    }
}
