<?php
require "connection.php";

$pdo = getConnection();

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


function deleteElement($pdo, $id)
{
    $sql = "DELETE FROM studenti WHERE id = ?";
    $stmt = $pdo->prepare($sql);

    try {
        $stmt->execute([$id]);
    } catch (PDOException $e) {
        echo "Error: " . $e->getMessage();
    }
}