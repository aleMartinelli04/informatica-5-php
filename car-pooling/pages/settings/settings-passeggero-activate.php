<!DOCTYPE html>
<?php
session_start();
if (!isset($_SESSION['userId'])) {
    header('Location: ../../../index.php');
}

$id = $_SESSION['userId'];

require '../../db/db.php';

$user = getPassenger($id);

if ($user) {
    header('Location: settings-passeggero.php');
}
?>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>Car Pooling - Settings</title>

    <!-- Bootstrap 5 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <!-- link to css -->
    <link href="../../style-car-pooling.css" rel="stylesheet" type="text/css">
</head>
<body>
<div class="d-flex align-items-center min-vh-100">
    <div class="container-fluid text-center">
        <p>Attivare profilo come profilo passeggero?</p>

        <form action="activate-passeggero.php" method="post">
            <input type="hidden" name="id" value="<?php echo $id; ?>">

            <!-- Docummento -->
            <div class="container mt-3">
                <label for="document">Documento</label>
                <input type="text" id="document" name="document" class="form-control" min="0">
            </div>

            <div class="container mt-5">
                <button type="submit" class="btn btn-dark w-100">Attiva</button>
            </div>
        </form>
    </div>
</div>

</body>
</html>