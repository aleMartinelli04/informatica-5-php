<!DOCTYPE html>
<?php require "db/pdo_singleton.php" ?>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>Profilo</title>

    <!-- Bootstrap 5 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <link href="style.css" rel="stylesheet" type="text/css">
</head>
<?php
session_start();

$email = $_SESSION['login']['email'];
$password = $_SESSION['login']['password'];
?>
<body style="background-color: whitesmoke">
<div class="d-flex align-items-center min-vh-100">
    <div class="container-fluid text-center">
        <?php if (!$email || !$password): ?>
            <h4>Non hai ancora effettuato il login</h4>
            <p>Vai <a href="index.php">qua</a> per accedere!</p>
        <?php else:
            $user = DB::run("SELECT * FROM utenti WHERE email=? AND password=?", $email, $password)->fetch(); ?>
            <img src="data:image/jpeg;base64,<?= $user['foto'] ?>" alt="Foto Utente"/>
            <br><br>
            <h4>Benvenuto, <?= $user['nome'] . " " . $user['cognome'] ?></h4>
            <p>Mail: <?= $user['email'] ?></p>
            <p>Codice Fiscale: <?= $user['codiceFiscale'] ?></p>
            <p>Info: <?= $user['informazioni'] ?></p>
        <?php endif; ?>
    </div>
</div>

</body>

</html>