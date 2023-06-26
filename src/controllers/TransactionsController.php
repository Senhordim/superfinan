<?php

namespace SFinan\Controllers;

use SFinan\Views\View;
use SFinan\Models\TransactionModel;
use SFinan\DB\Connection;
use SFinan\Models\CategoryModel;

class TransactionsController
{


    public function new()
    {
        $view = new View('/transactions/new.php');
        $category = new CategoryModel(Connection::getInstance());
        $categories = $category->findAll();
        $view->categories =  $categories;

        return $view->render();
    }

    public function edit(int $id)
    {
        $view = new View('/transactions/edit.php');
        $category = new CategoryModel(Connection::getInstance());
        $categories = $category->findAll();
        $view->categories =  $categories;

        $transaction = new TransactionModel(Connection::getInstance());
        $transaction = $transaction->find($id);

        $view->transaction =  $transaction;

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
