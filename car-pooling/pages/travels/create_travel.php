<!DOCTYPE html>
<?php
session_start();
if (!isset($_SESSION['userId'])) {
    header('Location: ../index.php');
}

$id = $_SESSION['userId'];

require '../../db/db.php';

$isDriver = isDriver($id);

if (!$isDriver) {
    header('Location: ../auth/logout.php');
}

$banner = false;
$travel = null;

if (isset($_SESSION['missingData'])) {
    $travel = $_SESSION['missingData'];
    unset($_SESSION['missingData']);

    $banner = true;
}

if (!$travel) {
    $travel = [
        'citta_partenza' => '',
        'citta_arrivo' => '',
        'data' => '',
        'tempo' => '',
        'posti_disponibili' => '',
        'prezzo' => ''
    ];
}

?>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>Car Pooling - Inserisci Viaggio</title>

    <!-- Bootstrap 5 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <!-- link to css -->
    <link href="../../style-car-pooling.css" rel="stylesheet" type="text/css">

    <!-- Font Awesome -->
    <script src="https://kit.fontawesome.com/97de4ea36d.js" crossorigin="anonymous"></script>
</head>
<body>
<div class="d-flex align-items-center min-vh-100">
    <div class="container-fluid text-center">
        <form action="save_travel.php" method="post" class="w-75 m-auto">
            <div class="container m-auto">
                <!-- Città partenza e arrivo -->
                <div class="row mb-3">
                    <div class="col-12 col-md-6">
                        <label for="cittaPartenza">Città di partenza</label>
                        <input type="text" id="cittaPartenza" name="cittaPartenza" class="form-control"
                               value="<?= $travel['citta_partenza'] ?>">
                    </div>
                    <div class="col-12 col-md-6">
                        <label for="cittaArrivo">Città di arrivo</label>
                        <input type="text" id="cittaArrivo" name="cittaArrivo" class="form-control"
                               value="<?= $travel['citta_arrivo'] ?>">
                    </div>
                </div>

                <!-- Datetime e tempo -->
                <div class="row mb-3">
                    <div class="col-12 col-md-6">
                        <label for="data">Data</label>
                        <input type="datetime-local" id="data" name="data" class="form-control"
                               value="<?= $travel['data_partenza'] ?>">
                    </div>
                    <div class="col-12 col-md-6">
                        <label for="tempo">Tempo stimato</label>
                        <input type="number" id="tempo" name="tempo" class="form-control"
                               value="<?= $travel['tempo'] ?>">
                    </div>
                </div>

                <!-- Posti disponibili e prezzo -->
                <div class="row mb-3">
                    <div class="col-12 col-md-6">
                        <label for="postiDisponibili">Posti disponibili</label>
                        <input type="number" id="postiDisponibili" name="postiDisponibili" class="form-control"
                               value="<?= $travel['posti'] ?>">
                    </div>
                    <div class="col-12 col-md-6">
                        <label for="costo">Costo</label>
                        <input type="number" id="costo" name="costo" class="form-control"
                               value="<?= $travel['costo'] ?>">
                    </div>
                </div>

                <!-- Dettagli -->
                <div class="mb-5">
                    <label for="dettagli">Dettagli</label>
                    <textarea id="dettagli" name="dettagli" class="form-control" content="<?= $travel['dettagli'] ?>">
                    </textarea>
                </div>
            </div>

            <!-- Banner -->
            <?php if ($banner): ?>
                <div class="container mt-5 mb-1 text-center">
                    <span class="text-danger">Compila tutti i campi</span>
                </div>
            <?php endif; ?>

            <!-- Button -->
            <div class="container">
                <button type="submit" class="btn btn-dark w-100">Pubblica Viaggio</button>
            </div>

            <!-- Back button -->
            <div class="container">
                <a href="../home.php" class="btn w-100 mt-3">Torna alla Home</a>
            </div>
        </form>
    </div>
</div>

</body>
</html>