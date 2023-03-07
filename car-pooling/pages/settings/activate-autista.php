<?php
$id = filter_input(INPUT_POST, 'id', FILTER_SANITIZE_NUMBER_INT);
$license = filter_input(INPUT_POST, 'license', FILTER_SANITIZE_NUMBER_INT);
$expiration = filter_input(INPUT_POST, 'expiration');

require '../../db/db.php';

createDriver($id, $license, $expiration);

header('Location: settings-autista.php');