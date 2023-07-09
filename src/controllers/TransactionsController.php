<?php

namespace SFinan\Controllers;

use FFI\Exception;
use SFinan\Services\Session\FlashMessage;
use SFinan\Views\View;
use SFinan\Models\TransactionModel;
use SFinan\DB\Connection;
use SFinan\Models\CategoryModel;
use SFinan\Services\Session\Session;

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

    public function create()
    {
        $data = $_POST;
        $data['user_id'] = Session::get('user')['id'];

        if ($data['amount'] <= 0) {
            FlashMessage::add('error', 'Uma transação tem que ser maior que 0');
            return header('Location: ' . $_ENV['BASE_URL'] . 'transactions/new');
        }

        try {
            $transaction = new TransactionModel(Connection::getInstance());
            $transaction->insert($data);
            FlashMessage::add('success', 'Transação efetuada com sucesso!');
            return header('Location: ' . $_ENV['BASE_URL']);
        } catch (Exception $e) {
            FlashMessage::add('error', 'Não foi possível registrar a transação');
        }
    }

    public function show(int $id)
    {
        $view = new View('/transactions/show.php');
        $transaction = $this->findById($id);
        $view->transaction =  $transaction;
        return $view->render();
    }

    public function edit(int $id)
    {
        $view = new View('/transactions/edit.php');
        $category = new CategoryModel(Connection::getInstance());
        $categories = $category->findAll();
        $view->categories =  $categories;
        $transaction = $this->findById($id);
        $view->transaction =  $transaction;
        return $view->render();
    }

    public function update(){
        $data = $_POST;
        $transaction = new TransactionModel(Connection::getInstance());
        $transaction->update($data);
        return header('Location: ' . $_ENV['BASE_URL']);
    }


    public function delete(int $id)
    {
        $transaction = new TransactionModel(Connection::getInstance());
        $transaction->delete($id);
        return header('Location: ' . $_ENV['BASE_URL']);
    }

    private function findById(int $id) : array
    {
        $transaction = new TransactionModel(Connection::getInstance());
        $transaction = $transaction->find($id);
        return $transaction;
    }

}
