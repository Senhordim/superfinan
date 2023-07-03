<?php

namespace SFinan\Controllers;

use SFinan\Services\Auth\Authenticator;
use SFinan\DB\Connection;
use SFinan\Models\UserModel;
use SFinan\Services\Session\FlashMessage;
use SFinan\Services\Session\Session;
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
        $authenticator = new Authenticator($user);

        if($authenticator->login($_POST)){
            header('Location: /');
            FlashMessage::add('success', 'Login efetuado com sucesso');
        } else {
            FlashMessage::add('error', 'Usuário ou senha inválidos');
            header('Location: /auth/login');
        }
    }

    public function logout() : void
    {
        (new Authenticator())->logout();
        header('Location: /auth/login');
        exit();
    }
}
