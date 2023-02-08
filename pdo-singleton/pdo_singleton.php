<?php

const HOST = "localhost";
const DB_NAME = "scuola";
const USER = "root";
const PASSWORD = "";
const CHARSET = "utf8mb4";


class PDOSingleton
{
    private static $instance = null;

    private function __construct()
    {
        $dsn = "mysql:host=" . HOST . ";dbname=" . DB_NAME . ";charset=" . CHARSET;

        $options = [
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
            PDO::ATTR_EMULATE_PREPARES => false,
        ];

        self::$instance = new PDO($dsn, USER, PASSWORD, $options);
    }

    public static function getInstance()
    {
        if (self::$instance == null) {
            $class = __CLASS__;
            self::$instance = new $class();
        }

        return self::$instance;
    }

    public static function run($sql, ...$args)
    {
        if (!$args) {
            return self::$instance->query($sql);
        }

        $statement = self::$instance->prepare($sql);
        $statement->execute($args);

        return $statement;
    }
}
