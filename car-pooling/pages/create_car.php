<!DOCTYPE html>
<?php
session_start();
if (!isset($_SESSION['userId'])) {
    header('Location: ../index.php');
}

$id = $_SESSION['userId'];

require '../db/db.php';

$isDriver = isDriver($id);

if (!$isDriver) {
    header('Location: ../auth/logout.php');
}

$banner = false;

if (isset($_SESSION['missingData'])) {
    $car = $_SESSION['missingData'];
    unset($_SESSION['missingData']);

    $banner = true;

} else {
    $car = getCar($id);
}


if (!$car) {
    $car = [
        'marca' => '',
        'modello' => '',
        'targa' => '',
        'num_posti' => 0
    ];
}
?>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>Car Pooling - Automobile</title>

    <!-- Bootstrap 5 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <!-- link to css -->
    <link href="../style-car-pooling.css" rel="stylesheet" type="text/css">

    <!-- Font Awesome -->
    <script src="https://kit.fontawesome.com/97de4ea36d.js" crossorigin="anonymous"></script>
</head>
<body>
<div class="align-items-center min-vh-100 d-flex">
    <div class="container-fluid">
        <div class="text-center">
            <p>Registra i dati della macchina</p>
        </div>

        <form method="post" action="save_car.php" class="w-75 m-auto">
            <!-- Marca -->
            <div class="container mt-5">
                <label for="marca">Marca</label>
                <input type="text" id="marca" name="marca" class="form-control" value="<?= $car['marca'] ?>">
            </div>

            <!-- Modello -->
            <div class="container mt-3">
                <label for="modello">Modello</label>
                <input type="text" id="modello" name="modello" class="form-control" value="<?= $car['modello'] ?>">
            </div>

            <!-- Targa -->
            <div class="container mt-3">
                <label for="targa">Targa</label>
                <input type="text" id="targa" name="targa" class="form-control" value="<?= $car['targa'] ?>">
            </div>

            <!-- Num Posti -->
            <div class="container mt-3 mb-5">
                <label for="numPosti">Numero Posti</label>
                <input type="number" id="numPosti" name="numPosti" class="form-control"
                       value="<?= $car['num_posti'] ?>">
            </div>

            <!-- Banner -->
            <?php if ($banner): ?>
                <div class="w-100 text-center mb-1">
                    <span class="text-danger">Inserisci tutti i dati</span>
                </div>
            <?php endif; ?>

            <!-- Button -->
            <div class="container">
                <button type="submit" class="btn btn-dark w-100">Salva Automobile</button>
            </div>
        </form>
    </div>
</div>

</body>
</html>