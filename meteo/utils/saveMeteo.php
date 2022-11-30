<?php

session_start();

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

$time = time();

if (!isset($_SESSION['meteo'][$city][$time])) {
    $_SESSION['meteo'][$city][$time] = array(
        'max' => $max,
        'min' => $min
    );
} else {
    $_SESSION['meteo'][$city][$time]['max'] = max($max, $_SESSION['meteo'][$city][$time]['max']);
    $_SESSION['meteo'][$city][$time]['min'] = min($min, $_SESSION['meteo'][$city][$time]['min']);
}


header("Location: ../index.php");