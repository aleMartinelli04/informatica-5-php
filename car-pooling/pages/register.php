<!DOCTYPE html>
<?php
session_start();

$messageBanner = false;

if (isset($_SESSION['missingData'])) {
    $data = $_SESSION['missingData'];
    unset($_SESSION['missingData']);

    $messageBanner = $_SESSION['message'];
}

if (isset($_SESSION['emailAlreadyUsed'])) {
    $data = $_SESSION['emailAlreadyUsed'];
    unset($_SESSION['emailAlreadyUsed']);

    $messageBanner = $_SESSION['message'];
}

if (isset($_SESSION['passwordsNotMatching'])) {
    $data = $_SESSION['passwordsNotMatching'];
    unset($_SESSION['passwordsNotMatching']);

    $messageBanner = $_SESSION['message'];
}

$email = isset($data['email']) ? $data['email'] : "";
$name = isset($data['name']) ? $data['name'] : "";
$surname = isset($data['surname']) ? $data['surname'] : "";
$phone = isset($data['phone']) ? $data['phone'] : "";

?>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>Car Pooling - Register</title>

    <!-- Bootstrap 5 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <link href="../style-car-pooling.css" rel="stylesheet" type="text/css">
</head>
<body>
<div class="d-flex align-items-center min-vh-100">
    <div class="container-fluid">
        <!-- Login / Register -->
        <div class="text-center">
            <p>Sei già registrato? Vai al <a href="../index.php">login</a>.</p>
        </div>

        <form method="post" action="../auth/register_user.php" class="w-75 m-auto">
            <!-- Nome e Cognome -->
            <div class="container mt-5">
                <div class="row">
                    <div class="col-12 col-md-6">
                        <label for="name">Nome</label>
                        <input type="text" id="name" name="name" class="form-control" value="<?= $name ?>">
                    </div>
                    <div class="col-12 col-md-6">
                        <label for="surname">Cognome</label>
                        <input type="text" id="surname" name="surname" class="form-control" value="<?= $surname ?>">
                    </div>
                </div>
            </div>

            <!-- Email -->
            <div class="container mt-3">
                <label for="email">Email</label>
                <input type="email" id="email" name="email" class="form-control" value="<?= $email ?>">
            </div>

            <!-- Password e Conferma-->
            <div class="container mt-3">
                <div class="row">
                    <div class="col-12 col-md-6">
                        <label for="password">Password</label>
                        <input type="password" id="password" name="password" class="form-control">
                    </div>
                    <div class="col-12 col-md-6">
                        <label for="confirmPassword">Conferma Password</label>
                        <input type="password" id="confirmPassword" name="confirmPassword" class="form-control">
                    </div>
                </div>
            </div>

            <!-- Numero Telefono -->
            <div class="container mt-3">
                <label for="phone">Numero di Telefono</label>
                <input type="tel" id="phone" name="phone" class="form-control" value="<?= $phone ?>">
            </div>

            <!-- Button -->
            <div class="container mt-5">
                <!-- Message Banner -->
                <?php if ($messageBanner): ?>
                    <div class="w-100 text-center mb-1">
                        <span class="text-danger"><?= $messageBanner ?></span>
                    </div>
                <?php endif; ?>
                <button type="submit" class="btn btn-dark w-100">Login</button>
            </div>
        </form>
    </div>
</div>
</body>
</html>

