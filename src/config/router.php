<?php

use Pecee\SimpleRouter\SimpleRouter;

SimpleRouter::setDefaultNamespace('SFinan\Controllers');

SimpleRouter::get('/', 'HomeController@index');

SimpleRouter::get('/expenses/new', 'ExpensesController@new');

SimpleRouter::start();
