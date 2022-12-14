<?php
require "models.php";

$name = filter_input(INPUT_POST, "name", FILTER_SANITIZE_STRING);
$surname = filter_input(INPUT_POST, "surname", FILTER_SANITIZE_STRING);
$cf = filter_input(INPUT_POST, "cf", FILTER_SANITIZE_STRING);
$registered = filter_input(INPUT_POST, "registered", FILTER_SANITIZE_STRING);

if ($name && $surname && $cf && $registered) {
    insertElement(getConnection(), $name, $surname, $cf, $registered == "on");
} else {
    echo "Error: missing data";
}

header("Location: index.php");
