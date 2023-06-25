<?php

namespace SFinan\Controllers;

use SFinan\DB\Connection;
use SFinan\Models\ExpenseModel;
use SFinan\Utils\FCurrency;
use SFinan\Views\View;

class HomeController
{
    public function index()
    {

        $expense = new ExpenseModel(Connection::getInstance());
        $view = new View('/home/index.php');
        $allExpenses = $expense->findAll();
        $view->expenses =  $allExpenses;
        $view->amountExpenses = HomeController::sumExpenses($allExpenses);
        return $view->render();
    }

    private static function sumExpenses($expenses) : float
    {
        $sum = 0;
        foreach ($expenses as $expense) {
            $sum += $expense['amount'];
        }
        return $sum;
    }
}
