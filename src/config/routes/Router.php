<?php

use Pecee\SimpleRouter\SimpleRouter;

SimpleRouter::setDefaultNamespace('SFinan\Controllers');

SimpleRouter::get('/auth/login', 'AuthController@login');
SimpleRouter::post('/auth/create', 'AuthController@create');
SimpleRouter::get('/auth/logout', 'AuthController@logout');

SimpleRouter::get('/', 'HomeController@index');

SimpleRouter::get('/transactions/new', 'TransactionsController@new');
SimpleRouter::get('/transactions/edit/{id}', 'TransactionsController@edit');

SimpleRouter::post('/transactions/create', 'TransactionsController@create');
SimpleRouter::post('/transactions/update', 'TransactionsController@update');
SimpleRouter::get('/transactions/delete/{id}', 'TransactionsController@delete');

SimpleRouter::start();
