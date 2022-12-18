<?php
session_start();

$name = trim(filter_input(INPUT_POST, 'name', FILTER_SANITIZE_STRING));
$name = empty($name) ? false : $name;

$surname = trim(filter_input(INPUT_POST, 'surname', FILTER_SANITIZE_STRING));
$surname = empty($surname) ? false : $surname;

$age = filter_input(INPUT_POST, 'age', FILTER_VALIDATE_INT);
$state = filter_input(INPUT_POST, 'state', FILTER_SANITIZE_STRING);
?>

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
<div class="container m-auto text-center p-5">
    <?php
    if (!$name || !$surname || !$age || !$state) {
        echo "<h3>Missing data!</h3>";
    } else {

        $foundState = array_filter($_SESSION['states'],
        function ($s) use ($state) {
            return $s['name'] == $state;
        })[0];

        if ($age < $foundState['age']) {
            echo "<h3>Underaged!</h3>";
        } else {
            $person = array(
                'name' => $name,
                'surname' => $surname,
                'age' => $age,
                'state' => $state
            );

            $_SESSION['people'][] = $person;

            echo "<h3>Person added!</h3>";
        }
    }

    ?>

    <a href="../index.php" class="btn btn-info mt-5">Back</a>
</div>
</body>
</html>
