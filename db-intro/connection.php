<?php
// connection to db with PDO
function getConnection()
{
    $host = "localhost";
    $dbName = "scuola";

    $user = "root";
    $password = "";

    // serve per sfruttare il DSM (Database Source Name)
    // una stringa che è associata a una struttura dati usata per descrivere una connessione ad una sorgente di dati
    // è una parte opzionale ma consigliata (tradotto, dobbiamo farla)
    $charset = "utf8mb4";

    // il DSN contiene: host, schema (db), name, charset + unix_socket, less frequently used port
    // costruttore: username, password
    // options: array() -> gestione errori e fetch informazioni
    $dsn = "mysql:host=$host;dbname=$dbName;charset=$charset";

    $options = [
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
        PDO::ATTR_EMULATE_PREPARES => false,
    ];

    // global $pdo;

    $pdo = new PDO($dsn, $user, $password, $options);

    return $pdo;
}

