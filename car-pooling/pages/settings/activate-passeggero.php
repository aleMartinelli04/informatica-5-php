<?php
$id = filter_input(INPUT_POST, 'id', FILTER_SANITIZE_NUMBER_INT);
$document = filter_input(INPUT_POST, 'document');

require '../../db/db.php';

createPassenger($id, $document);

header('Location: settings-passeggero.php');