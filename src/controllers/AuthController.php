<?php

namespace SFinan\Controllers;

use SFinan\Auth\Autenticador;
use SFinan\DB\Connection;
use SFinan\Models\UserModel;
use SFinan\Views\View;

class AuthController
{
    public function login()
    {
        $view = new View('/auth/login.php');
        return $view->render();
    }

    public function create()
    {
        $user = new UserModel(Connection::getInstance());
        $authenticator = new Autenticador($user);
        if($authenticator->login($_POST)){
            header('Location: /');
            exit();
        }
    }
}
