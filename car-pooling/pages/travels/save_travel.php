<?php
session_start();
$id = $_SESSION['userId'];

$cittaPartenza = filter_input(INPUT_POST, 'cittaPartenza');
$cittaArrivo = filter_input(INPUT_POST, 'cittaArrivo');
$data = filter_input(INPUT_POST, 'data');
$postiDisponibili = filter_input(INPUT_POST, 'postiDisponibili', FILTER_VALIDATE_INT);
$costo = filter_input(INPUT_POST, 'costo', FILTER_VALIDATE_FLOAT);
$tempo = filter_input(INPUT_POST, 'tempo');
$dettagli = filter_input(INPUT_POST, 'dettagli');

if (!$cittaPartenza || !$cittaArrivo || !$data || !$postiDisponibili || !$costo || !$tempo) {
    $_SESSION['missingData'] = [
        'citta_partenza' => $cittaPartenza,
        'citta_arrivo' => $cittaArrivo,
        'data_partenza' => $data,
        'posti' => $postiDisponibili,
        'costo' => $costo,
        'tempo' => $tempo,
        'dettagli' => $dettagli
    ];

    header('Location: create_travel.php');
} else {
    require '../../db/db.php';

    createTravel($id, $cittaPartenza, $cittaArrivo, $data, $postiDisponibili, $costo, $tempo, true, '');

    header('Location: ../home.php');
}

