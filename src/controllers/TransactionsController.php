<?php

namespace SFinan\Controllers;

use SFinan\Views\View;
use SFinan\Models\TransactionModel;
use SFinan\DB\Connection;
use SFinan\Models\CategoryModel;

class TransactionsController
{

    private $category = new CategoryModel(Connection::getInstance());
    public function new()
    {
        $view = new View('/transactions/new.php');

        $categories = $this->category->findAll();
        $view->categories =  $categories;

        return $view->render();
    }

    public function edit()
    {
        $view = new View('/transactions/edit.php');

        $categories = $this->category->findAll();
        $view->categories =  $categories;

        return $view->render();
    }

    public function create()
    {
        $data = $_POST;
        $transaction = new TransactionModel(Connection::getInstance());
        $transaction->insert($data);
        return header('Location: ' . $_ENV['BASE_URL']);
    }

}
