<?php
$email = filter_input(INPUT_POST, 'email', FILTER_VALIDATE_EMAIL);
$password = filter_input(INPUT_POST, 'password');

if (!$email || !$password) {
    session_start();
    $_SESSION['missingData'] = $email ?: "";

    header('Location: ../index.php');

} else {
    require '../db/db.php';

    $user = getUserByEmail($email);

    session_start();

    if (!$user) {
        $_SESSION['wrongEmail'] = $email;

        header('Location: ../index.php');
    } else {
        if ($user['password'] === $password) {
            $_SESSION['userId'] = $user['id'];

            header('Location: ../pages/home.php');
        } else {
            $_SESSION['wrongPassword'] = $email;

            header('Location: ../index.php');
        }
    }
}
