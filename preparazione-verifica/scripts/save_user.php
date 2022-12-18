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
    <?php if (!$name || !$surname || !$age || !$state): ?>
        <h3>Insert all data</h3>

    <?php else:
        $stateFound = array_filter(
            $_SESSION['states'],
            function ($s) use ($state) {
                return $s['name'] == $state;
            }
        )[0];
        ?>

        <?php if ($stateFound['age'] > $age): ?>
        <h3>You are underaged!</h3>

        <?php else:
        $_SESSION['people'][] = array(
            "name" => $name,
            "surname" => $surname,
            "age" => $age,
            "state" => $state
        ); ?>
            <h3>Correctly registered!</h3>

        <?php endif; ?>

    <?php endif; ?>

    <a href="../index.php" class="btn btn-info mt-5">Back</a>
</div>
</body>
</html>
