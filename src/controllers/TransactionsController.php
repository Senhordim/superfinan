<?php

namespace SFinan\Controllers;


use SFinan\Views\View;
use SFinan\Models\TransactionModel;
use SFinan\DB\Connection;

class TransactionsController
{

    public function new()
    {
        $view = new View('/transactions/new.php');
        return $view->render();
    }

    public function create()
    {
        $data = $_POST;
        $expense = new TransactionModel(Connection::getInstance());
        $expense->insert($data);
        return header('Location: ' . $_ENV['BASE_URL']);
    }

}
