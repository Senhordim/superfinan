<?php

use Dotenv\Dotenv;

define('APP_PATH', getcwd());

require APP_PATH . '/vendor/autoload.php';

$dotenv = Dotenv::createImmutable(APP_PATH);

$dotenv->load();

define('VIEWS_PATH', APP_PATH . '/src/views');

define('ASSETS_PATH', APP_PATH . '/assets');

date_default_timezone_set('America/Sao_Paulo');

define('BASE_URL', $_ENV['BASE_URL']);

