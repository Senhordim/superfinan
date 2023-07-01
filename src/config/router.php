<?php

use Pecee\SimpleRouter\SimpleRouter;

SimpleRouter::setDefaultNamespace('SFinan\Controllers');

SimpleRouter::get('/', 'HomeController@index')->name('home');

SimpleRouter::get('/transactions/new', 'TransactionsController@new');
SimpleRouter::get('/transactions/edit/{id}', 'TransactionsController@edit');

SimpleRouter::post('/transactions/create', 'TransactionsController@create');
SimpleRouter::post('/transactions/update', 'TransactionsController@update');
SimpleRouter::get('/transactions/delete/{id}', 'TransactionsController@delete');

SimpleRouter::start();
