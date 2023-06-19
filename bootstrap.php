<?php 

use Dotenv\Dotenv;

define('APP_PATH', getcwd());

require APP_PATH . '/vendor/autoload.php';

$dotenv = Dotenv::createImmutable(APP_PATH);

$dotenv->load();

define('VIEWS_PATH', APP_PATH . '/src/views');

define('ASSETS_PATH', APP_PATH . '/assets');

