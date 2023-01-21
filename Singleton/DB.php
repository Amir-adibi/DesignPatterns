<?php

class DB
{
    private static $db;

    private function __construct()  // since we don't want to make objects out of this class, we use "private" form of constructor
    {
    }

    public static function get(): PDO
    {
        if (is_null(self::$db)) {
            var_dump('Initializing PDO...');

            $config = require __DIR__ . '/config.php';
            self::$db = new PDO('mysql:host=' . $config['DB_HOST'] . ';dbname=' . $config['DB_DBNAME'],
                $config['DB_USERNAME'],
                $config['DB_PASSWORD']
            );
        }
        return self::$db;
    }


}