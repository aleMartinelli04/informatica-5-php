<!DOCTYPE html>
<?php require "db/pdo_singleton.php" ?>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>Portale Registrazioni</title>

    <!-- Bootstrap 5 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <link href="style.css" rel="stylesheet" type="text/css">
</head>
<?php
$mailMessage = "";
$passwordMessage = "";

if (!empty($_POST)) {
    $email = filter_input(INPUT_POST, 'email', FILTER_VALIDATE_EMAIL);
    $password = filter_input(INPUT_POST, 'password');

    if (!$email || !$password) {
        if (!$email) {
            $mailMessage = "Inserisci una mail valida";
        }

        if (!$password) {
            $passwordMessage = "Inserisci la password";
        }
    } else {
        $registered = DB::run("SELECT EXISTS(
               SELECT 1
               FROM utenti
               WHERE email = ?
           ) as MailExists;", $email)->fetch()['MailExists'];

        if (!$registered) {
            $mailMessage = "Mail non ancora registrata!";
        } else {
            $authenticated = DB::run("SELECT EXISTS(
                SELECT 1
                FROM utenti
                WHERE email = ? AND password = ?
            ) as Authenticated;", $email, $password)->fetch()['Authenticated'];

            if (!$authenticated) {
                $passwordMessage = "Password sbagliata!";
            } else {
                session_start();
                $_SESSION['login'] = [
                    "email" => $email,
                    "password" => $password
                ];

                header("Location: home.php");
            }
        }
    }
}
?>
<body style="background-color: whitesmoke">
<div class="d-flex align-items-center min-vh-100">
    <div class="container-fluid">
        <!-- Login / Register -->
        <div class="w-75 m-auto text-center">
            <h2>Bentornato!</h2>
            <p>Effettua il login o <a href="auth/register.php">registrati</a> per accedere!</p>
        </div>

        <form method="post" class="container w-75 m-auto">
            <!-- Email -->
            <div class="w-100">
                <div class="w-100 row m-auto">
                    <label for="email" class="col-6 px-0">Email</label>
                    <?php if ($mailMessage != ""): ?>
                        <span class="text-danger col-6 text-end"><?= $mailMessage ?></span>
                    <?php endif; ?>
                </div>
                <input class="form-control" id="email" name="email" placeholder="Email" autocomplete="off"
                       maxlength="64" type="email" style="padding: 10px" required>
            </div>

            <!-- Password -->
            <div class="mt-3 w-100">
                <div class="w-100 row m-auto">
                    <label for="password" class="col-6 px-0">Password</label>

                    <?php if ($passwordMessage != ""): ?>
                        <span class="text-danger col-6 text-end"><?= $passwordMessage ?></span>
                    <?php endif; ?>
                </div>

                <input class="form-control" id="password" name="password" placeholder="Password" autocomplete="off"
                       minlength="0" maxlength="64" type="password" style="padding: 10px" required>
            </div>

            <!-- Login Button -->
            <button class="btn w-100 mt-5 custom-button" type="submit">Login</button>
        </form>
    </div>
</div>

</body>

</html>