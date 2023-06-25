<?php

namespace SFinan\Controllers;


use SFinan\Views\View;
use SFinan\Models\ExpenseModel;
use SFinan\DB\Connection;

class ExpensesController
{

    public function new()
    {
        $view = new View('/expenses/new.php');
        return $view->render();
    }

    public function create()
    {
        $data = $_POST;
        $expense = new ExpenseModel(Connection::getInstance());
        $expense->insert($data);
        return header('Location: ' . $_ENV['BASE_URL']);
    }

}
