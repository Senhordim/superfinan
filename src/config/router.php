<?php 

use Pecee\SimpleRouter\SimpleRouter;

SimpleRouter::setDefaultNamespace('SFinan\Controllers');

SimpleRouter::get('/', 'HomeController@index');

SimpleRouter::start();