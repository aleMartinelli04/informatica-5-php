<?php
require "connection.php";

function getAll($pdo)
{
    $sql = "SELECT * FROM studenti";
    $stmt = $pdo->query($sql);

    try {
        $stmt->execute();
        return $stmt->fetchAll();
    } catch (PDOException $e) {
        echo "Error: " . $e->getMessage();
        return null;
    }
}


function deleteElementWithId($pdo, $id)
{
    $sql = "DELETE FROM studenti WHERE id = ?";
    $stmt = $pdo->prepare($sql);

    try {
        $stmt->execute([$id]);
    } catch (PDOException $e) {
        echo "Error: " . $e->getMessage();
    }
}



function insertElement($pdo, $name, $surname, $cf, $registered)
{
    $sql = "INSERT INTO studenti (name, surname, cf, registered) VALUES (?, ?, ?, ?)";
    $stmt = $pdo->prepare($sql);

    try {
        $stmt->execute([$name, $surname, $cf, $registered]);
    } catch (PDOException $e) {
        echo "Error: " . $e->getMessage();
    }
}

function searchByName($pdo, $name)
{
    $sql = "SELECT * FROM studenti WHERE name = ?";
    $stmt = $pdo->prepare($sql);

    try {
        $stmt->execute([$name]);
        return $stmt->fetchAll();
    } catch (PDOException $e) {
        echo "Error: " . $e->getMessage();
        return null;
    }
}