<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>Weather - table</title>

    <!-- Bootstrap 5 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>
<body>
<div class="container mt-5 mx-5">
    <?php foreach ($_SESSION['meteo'] as $city => $meteo) : ?>
        <h2><?= $city; ?></h2>

        <table class="table">
            <thead>
            <tr>
                <th>Date</th>
                <th>Hour</th>
                <th>Max temperature</th>
                <th>Min temperature</th>
            </tr>
            </thead>
            <tbody>

            <?php foreach ($meteo as $date => $data) : ?>
                <tr>
                    <td><?= date('d/m/Y', $date); ?></td>
                    <td><?= date('H:m:s', $date); ?></td>
                    <td><?= $data['max']; ?></td>
                    <td><?= $data['min']; ?></td>
                </tr>
            <?php endforeach; ?>

            </tbody>
        </table>
    <?php endforeach; ?>

    <a href="../index.php" class="btn btn-primary mt-5">Back</a>
</div>
</body>

</html>