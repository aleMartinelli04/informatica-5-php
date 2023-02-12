<?php

class DBCompany
{
    private static $instance = null;

    public static function run($sql, ...$args)
    {
        if (!$args) {
            return self::getInstance()->query($sql);
        }

        $statement = self::getInstance()->prepare($sql);
        $statement->execute($args);

        return $statement;
    }

    public static function getInstance()
    {
        if (self::$instance == null) {
            $dsn = "mysql:host=localhost;dbname=company;charset=utf8mb4";

            $options = [
                PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
                PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
                PDO::ATTR_EMULATE_PREPARES => false,
            ];

            self::$instance = new PDO($dsn, "root", "", $options);
        }

        return self::$instance;
    }
}
