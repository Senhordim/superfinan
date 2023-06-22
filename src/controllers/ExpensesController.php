<?php

namespace SFinan\Controllers;

use SFinan\Views\View;

class ExpensesController
{
    public function index()
    {

        $view = new View('/home/index.php');
        return $view->render();
    }

    public function new()
    {
        $view = new View('/expenses/new.php');
        return $view->render();
    }

}
