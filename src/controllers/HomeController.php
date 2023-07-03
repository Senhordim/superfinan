<?php

namespace SFinan\Controllers;

use SFinan\DB\Connection;
use SFinan\Models\TransactionModel;

use SFinan\Services\Auth\CheckUserLogged;
use SFinan\Views\View;

class HomeController extends BaseController
{
    use CheckUserLogged;

    public function __construct()
    {
        $this->check();
    }
    public function index()
    {
        $view = new View('/home/index.php');

        $transaction = new TransactionModel(Connection::getInstance());

        $allTransactions = $transaction->findAll(order: 'DESC');
        $view->allTransactions =  $allTransactions ;

        $allTransactionsDebit = $transaction->where(['type' => 0]);
        $view->amountDebitTransactions = HomeController::sumExpenses($allTransactionsDebit);

        $allTransactionsCredit = $transaction->where(['type' => 1]);
        $view->amountCreditTransactions = HomeController::sumExpenses($allTransactionsCredit);

        return $view->render();
    }

    private static function sumExpenses($transactions) : float
    {
        $sum = 0;
        foreach ($transactions as $transaction) {
            $sum += $transaction['amount'];
        }
        return $sum;
    }
}
