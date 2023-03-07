<!DOCTYPE html>
<?php
session_start();
if (!isset($_SESSION['userId'])) {
    header('Location: ../index.php');
}

$id = $_SESSION['userId'];

require '../db/db.php';

$isPassenger = isPassenger($id);
$isDriver = isDriver($id);
?>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>Car Pooling - Home</title>

    <!-- Bootstrap 5 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <!-- link to css -->
    <link href="../style-car-pooling.css" rel="stylesheet" type="text/css">

    <!-- Font Awesome -->
    <script src="https://kit.fontawesome.com/97de4ea36d.js" crossorigin="anonymous"></script>
</head>
<body>
<div class="d-flex align-items-center min-vh-100">
    <div class="container-fluid text-center">
        <a href="../auth/logout.php">
            Logout <i class="fa-solid fa-right-from-bracket"></i>
        </a>

        <br>

        <a href="settings/settings-passeggero-activate.php">
            Settings Passeggero <i class="fa-solid fa-right-from-bracket"></i>
        </a>

        <br>

        <a href="settings/settings-autista-activate.php">
            Settings Autista <i class="fa-solid fa-right-from-bracket"></i>
        </a>

        <br>
        <?= 'pass: ' . ($isPassenger ? 'true' : 'false') ?>
        <?= 'driver: ' . ($isDriver ? 'true' : 'false') ?>
    </div>
</div>

</body>
</html>