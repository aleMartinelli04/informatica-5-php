<?php
session_start();

$_SESSION['people'] = array();

header('Location: ../table.php');


$giorgio = array(
    "nome" => "Giorgio",
    "cognome" => "Bianchi",
    "anni" => 18
);

$marco = array(
    "nome" => "Marco",
    "cognome" => "Rossi",
    "anni" => 20
);

$gianni = array(
    "nome" => "Gianni",
    "cognome" => "Verdi",
    "anni" => 22
);

$persone = array($giorgio, $marco, $gianni);

foreach ($persone as $persona) {
    echo $persona['nome'] . " " . $persona['cognome'] . " " . $persona['anni'] . "<br>";
}

$mappa = array(
    "italia" => "Roma",
    "francia" => "Parigi",
    "spagna" => "Madrid",
    "germania" => "Berlino"
);

foreach ($mappa as $nazione => $capitale) {
    echo $nazione . " " . $capitale . "<br>";
}


