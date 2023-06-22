<?php 

namespace SFinan\DB;

class Connection
{
    private static $instance = null;
    private function __construct() {}
    public static function getInstance()
    {

        if(is_null(self::$instance))
        {
            self::$instance = new \PDO( $_ENV['DB_DRIVER'] . ':host='. $_ENV['DB_HOST'] . ';port=' . $_ENV['DB_PORT'] . ';dbname=portal', 'senhordim', '');
            // self::$instance->exec('SET NAMES UTF8');
        }

        return self::$instance;

    }
}