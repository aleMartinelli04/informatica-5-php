<!DOCTYPE html>
<?php
session_start();
if (isset($_SESSION['userId'])) {
    header('Location: pages/home.php');
}

$missingDataBanner = false;
$emailBanner = false;
$passwordBanner = false;

$email = "";

if (isset($_SESSION['missingData'])) {
    $email = $_SESSION['missingData'];
    $missingDataBanner = true;

    unset($_SESSION['missingData']);
}

if (isset($_SESSION['wrongEmail'])) {
    $email = $_SESSION['wrongEmail'];
    $emailBanner = true;

    unset($_SESSION['wrongEmail']);
}

if (isset($_SESSION['wrongPassword'])) {
    $email = $_SESSION['wrongPassword'];
    $passwordBanner = true;

    unset($_SESSION['wrongPassword']);
}
?>

<html lang="en">
<head>
    <meta charset="utf-8">
    <title>Car Pooling - Login</title>

    <!-- Bootstrap 5 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <!-- link to css -->
    <link href="style-car-pooling.css" rel="stylesheet" type="text/css">
</head>
<body>
<div class="d-flex align-items-center min-vh-100">
    <div class="container-fluid">
        <!-- Login / Register -->
        <div class="text-center">
            <p>Fai il login o <a href="pages/register.php">registrati</a>!</p>
        </div>

        <form method="post" action="auth/login.php" class="w-75 m-auto">
            <!-- Email -->
            <div class="container mt-5">
                <div class="row">
                    <div class="col">
                        <label for="email">Email</label>
                    </div>
                    <?php if ($emailBanner): ?>
                        <div class="col text-end">
                            <span class="text-danger">Email non valida</span>
                        </div>
                    <?php endif; ?>
                </div>
                <input type="email" id="email" name="email" class="form-control" value="<?= $email ?>">
            </div>

            <!-- Password -->
            <div class="container mt-3 mb-5">
                <div class="row">
                    <div class="col">
                        <label for="password">Password</label>
                    </div>
                    <?php if ($passwordBanner): ?>
                        <div class="col text-end">
                            <span class="text-danger">Password errata</span>
                        </div>
                    <?php endif; ?>
                </div>
                <input type="password" id="password" name="password" class="form-control">
            </div>

            <!-- Missing data -->
            <?php if ($missingDataBanner): ?>
                <div class="container mt-5 mb-1 text-center">
                    <span class="text-danger">Inserisci email e password</span>
                </div>
            <?php endif; ?>

            <!-- Button -->
            <div class="container">
                <button type="submit" class="btn btn-dark w-100">Login</button>
            </div>
        </form>
    </div>
</div>

</body>
</html>