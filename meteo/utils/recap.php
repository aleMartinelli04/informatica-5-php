<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>Weather - recap</title>

    <!-- Bootstrap 5 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>
<body>
<div class="container mt-5 mx-5">
    <!-- Max, min and average temperature for each city -->
    <?php
    foreach ($_SESSION['meteo'] as $city => $meteo) {
        $max = 0;
        $min = 0;
        $tot = 0;
        $count = 0;

        foreach ($meteo as $date => $data) {
            $max = max($max, $data['max']);
            $min = min($min, $data['min']);

            $tot += $data['max'] + $data['min'];
            $count += 2;
        }

        echo "<h2>$city</h2>";
        echo "<p>Max temperature: $max</p>";
        echo "<p>Min temperature: $min</p>";
        echo "<p>Average temperature: " . round($tot / $count, 2) . "</p>";
    }
    ?>

    <a href="../index.php" class="btn btn-primary mt-5">Back</a>
</div>
</body>

</html>

