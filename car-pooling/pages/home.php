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

$user = getUser($id);
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
<div class="container m-auto">
    <div class="header mt-3 m-auto">
        <div class="row text-center">
            <!-- PASSEGGERO prenota viaggio -->
            <?php if ($isPassenger): ?>
                <a href="travels/book_travel.php" class="col">
                    Prenota Viaggio <i class="fa-solid fa-book"></i>
                </a>
            <?php else: ?>
                <a href="settings/settings-passeggero.php" class="col">
                    Attiva Account Passeggero <i class="fa-solid fa-lock-open"></i>
                </a>
            <?php endif; ?>

            <!-- AUTISTA propone viaggio, inserisce automobile -->
            <?php if ($isDriver and getCar($id)) : ?>
                <a href="travels/create_travel.php" class="col">
                    Crea Viaggio <i class="fa-solid fa-route"></i>
                </a>
            <?php endif; ?>

            <?php if ($isDriver): ?>
                <a href="car/create_car.php" class="col">
                    Dati Automobile <i class="fa-solid fa-car"></i>
                </a>
            <?php else: ?>
                <a href="settings/settings-autista.php" class="col">
                    Attiva Account Autista <i class="fa-solid fa-lock-open"></i>
                </a>
            <?php endif; ?>

            <!-- TUTTI possono fare una recensione -->
            <?php if ($isPassenger || $isDriver): ?>
                <a href="feedbacks/create_feedback.php" class="col">
                    Fai una recensione <i class="fa-solid fa-comment"></i>
                </a>
            <?php endif; ?>

            <a href="../auth/logout.php" class="col">
                Logout <i class="fa-solid fa-right-from-bracket"></i>
            </a>
        </div>
    </div>

    <div class="container align-items-center min-vh-100 d-flex">
        <div class="container-fluid text-center">
            <p>Benvenuto, <b><?= $user['nome'] . ' ' . $user['cognome'] ?></b></p>
            <p><b>Email:</b> <?= $user['email'] ?></p>
            <p><b>Numero Telefono:</b> <?= $user['num_telefono'] ?></p>
        </div>
    </div>
</div>

</body>
</html>