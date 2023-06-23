<?php

namespace SFinan\Controllers;


use SFinan\Views\View;
use SFinan\Models\Expense;
use SFinan\DB\Connection;

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

    public function create()
    {
        $data = $_POST;

        $data['category_id'] = 1;

        $expense = new Expense(Connection::getInstance());

        $expense->insert($data);

        return header('Location: ' . $_ENV['BASE_URL']);
    }

}
