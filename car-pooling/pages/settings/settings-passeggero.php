<!DOCTYPE html>
<?php
session_start();
if (!isset($_SESSION['userId'])) {
    header('Location: pages/home.php');
}

$id = $_SESSION['userId'];

require '../../db/db.php';

$passenger = getPassenger($id);

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
    <div class="container-fluid">
        <?php print_r($passenger); ?>

        <a href="../home.php" class="btn btn-dark">Home</a>
    </div>
</div>

</body>
</html>