<?php
session_start();
$id = $_SESSION['userId'];

$marca = filter_input(INPUT_POST, 'marca');
$modello = filter_input(INPUT_POST, 'modello');
$targa = filter_input(INPUT_POST, 'targa');
$numPosti = filter_input(INPUT_POST, 'numPosti', FILTER_VALIDATE_INT);

$car = [
    'marca' => $marca,
    'modello' => $modello,
    'targa' => $targa,
    'num_posti' => $numPosti
];

if (!$marca || !$modello || !$targa || !$numPosti) {
    $_SESSION['missingData'] = $car;

    header('Location: create_car.php');
} else {
    require '../../db/db.php';

    insertOrUpdateCar($id, $marca, $modello, $targa, $numPosti);

    header('Location: ../home.php');
}

