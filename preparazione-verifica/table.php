<?php session_start(); ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Preparazione Verifica</title>

    <!-- Bootstrap CSS and JS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/css/bootstrap.min.css"
          integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
</head>
<body>
<div class="container m-auto text-center">
    <table class="table w-75 m-auto mt-5">
        <thead>
        <tr>
            <th>Name</th>
            <th>Surname</th>
            <th>Age</th>
            <th>Country</th>
        </tr>
        </thead>
        <tbody>
        <?php foreach ($_SESSION['people'] as $person): ?>
            <tr>
                <td><?= $person['name'] ?></td>
                <td><?= $person['surname'] ?></td>
                <td><?= $person['age'] ?></td>
                <td><?= $person['state'] ?></td>
            </tr>
        <?php endforeach; ?>
        </tbody>
    </table>

    <hr class="my-5 w-75">

    <a href="index.php" class="btn btn-info">Back</a>
    <a href="scripts/reset.php" class="btn btn-danger">Clear</a>
</div>
</body>
</html>