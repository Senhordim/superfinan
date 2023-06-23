<?php

use Pecee\SimpleRouter\SimpleRouter;

SimpleRouter::setDefaultNamespace('SFinan\Controllers');

SimpleRouter::get('/', 'HomeController@index')->name('home');

SimpleRouter::get('/expenses/new', 'ExpensesController@new')->name('new_expense');

SimpleRouter::post('/expenses/create', 'ExpensesController@create')->name('new_expense');

SimpleRouter::start();
