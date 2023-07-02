<?php

namespace SFinan\Auth;

use SFinan\Models\UserModel;
use SFinan\Session\Session;

class Autenticador
{

    private UserModel $user;

    public function __construct(UserModel $user)
    {
        $this->user = $user;

    }

    public function login(array $credentials) : bool
    {
        $user = current($this->user->where([
            'email' => $credentials['email']
        ]));

        if(!$user){
            return false;
        }

        if($user['password'] !== $credentials['password']){
            return false;
        }

        unset($user['password']);

        Session::add('user', $user);

        return true;
    }

    public function logout()
    {
        if(Session::has('user'))
            Session::remove('user');
    }

    public static function check() : void
    {
        if (!self::isLogged()) {
            header('Location: /login');
            exit();
        }
    }

    public static function isLogged()
    {
        return isset($_SESSION['auth']);
    }

}
