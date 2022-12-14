<?php

require "models.php";

$value = filter_input(INPUT_POST, "id", FILTER_SANITIZE_NUMBER_INT);

if ($value) {
    $pdo = getConnection();
    deleteElementWithId($pdo, $value);

    header("Location: show_data.php");
} else {
    echo "Error";
}