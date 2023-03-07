<?php
function getPDO()
{
    $dsn = "mysql:host=localhost;dbname=CarPooling;charset=utf8mb4";

    $options = [
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
        PDO::ATTR_EMULATE_PREPARES => false,
    ];

    return new PDO($dsn, "root", "", $options);
}

function getUserByEmail($email)
{
    $pdo = getPDO();

    $statement = $pdo->prepare("SELECT * FROM utente WHERE email=?");
    $statement->execute([$email]);

    return $statement->fetch();
}

function getUser($id)
{
    $pdo = getPDO();

    $statement = $pdo->prepare("SELECT * FROM utente WHERE id=?");
    $statement->execute([$id]);

    return $statement->fetch();
}

function insertUser($name, $surname, $email, $password, $phone)
{
    $pdo = getPDO();

    $statement = $pdo->prepare("INSERT INTO utente (nome, cognome, email, password, num_telefono) VALUES (?, ?, ?, ?, ?)");
    $statement->execute([$name, $surname, $email, $password, $phone]);

    return $pdo->lastInsertId();
}

function getPassenger($id)
{
    $pdo = getPDO();

    $statement = $pdo->prepare("SELECT * FROM passeggero WHERE utente=?");
    $statement->execute([$id]);

    return $statement->fetch();
}

function createPassenger($id, $document)
{
    $pdo = getPDO();

    $statement = $pdo->prepare("INSERT INTO passeggero (utente, documento) VALUES (?, ?)");
    $statement->execute([$id, $document]);
}

function isPassenger($id)
{
    $pdo = getPDO();

    $statement = $pdo->prepare("SELECT EXISTS(SELECT * FROM passeggero WHERE utente=?) as result");
    $statement->execute([$id]);

    return $statement->fetch()['result'];
}

function getDriver($id)
{
    $pdo = getPDO();

    $statement = $pdo->prepare("SELECT * FROM autista WHERE utente=?");
    $statement->execute([$id]);

    return $statement->fetch();
}

function createDriver($id, $license, $expiration)
{
    $pdo = getPDO();

    $statement = $pdo->prepare("INSERT INTO autista (utente, num_patente, scadenza_patente) VALUES (?, ?, ?)");
    $statement->execute([$id, $license, $expiration]);
}

function isDriver($id)
{
    $pdo = getPDO();

    $statement = $pdo->prepare("SELECT EXISTS(SELECT * FROM autista WHERE utente=?) as result");
    $statement->execute([$id]);

    return $statement->fetch()['result'];
}