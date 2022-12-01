<?php
$city = filter_input(INPUT_POST, 'city', FILTER_SANITIZE_STRING);
$max = filter_input(INPUT_POST, 'max', FILTER_SANITIZE_NUMBER_FLOAT, FILTER_FLAG_ALLOW_FRACTION);
$min = filter_input(INPUT_POST, 'min', FILTER_SANITIZE_NUMBER_FLOAT, FILTER_FLAG_ALLOW_FRACTION);

if (!$city || !$max || !$min) {
    echo 'Missing data';
    exit;
}

if ($min > $max) {
    echo 'Min temperature cannot be greater than max temperature';
    exit;
}

session_start();

$time = time();

$_SESSION['meteo'][$city][$time] = array(
    'max' => $max,
    'min' => $min
);

header("Location: ../index.php");