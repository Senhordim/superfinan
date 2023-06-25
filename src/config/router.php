<?php

use Pecee\SimpleRouter\SimpleRouter;

SimpleRouter::setDefaultNamespace('SFinan\Controllers');

SimpleRouter::get('/', 'HomeController@index')->name('home');

SimpleRouter::get('/transactions/new', 'TransactionsController@new')->name('new_transactions');

SimpleRouter::post('/transactions/create', 'TransactionsController@create')->name('create_transactions');

SimpleRouter::start();
