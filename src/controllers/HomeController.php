<?php

namespace SFinan\Controllers;
use SFinan\Views\View;

class HomeController
{
    public function index()
    {
        $view = new View('/home/index.php');

        return $view->render();
    }
}