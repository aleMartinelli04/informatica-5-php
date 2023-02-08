<?php

const HOST = "localhost";
const DB_NAME = "portale_login";
const USER = "root";
const PASSWORD = "";
const CHARSET = "utf8mb4";


class DB
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
            $dsn = "mysql:host=" . HOST . ";dbname=" . DB_NAME . ";charset=" . CHARSET;

            $options = [
                PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
                PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
                PDO::ATTR_EMULATE_PREPARES => false,
            ];

            self::$instance = new PDO($dsn, USER, PASSWORD, $options);
        }

        return self::$instance;
    }
}
