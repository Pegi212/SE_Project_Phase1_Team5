<?php

class DbConfig
{
    private static $connection;

    public static function getConnection()
    {
        if (!self::$connection) {
            self::$connection = new mysqli('127.0.0.1', 'root', '', 'alb_esthetics');
            if (self::$connection->connect_error) {
                throw new Exception('Cannot connect to database: ' . self::$connection->connect_error);
            }
        }

        return self::$connection;
    }
}

?>