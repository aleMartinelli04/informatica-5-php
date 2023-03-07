<?php
$name = filter_input(INPUT_POST, 'name');
$surname = filter_input(INPUT_POST, 'surname');
$email = filter_input(INPUT_POST, 'email', FILTER_VALIDATE_EMAIL);
$password = filter_input(INPUT_POST, 'password');
$confirmPassword = filter_input(INPUT_POST, 'confirmPassword');
$phone = filter_input(INPUT_POST, 'phone');

$data = [
    'name' => $name ?: "",
    'surname' => $surname ?: "",
    'email' => $email ?: "",
    'phone' => $phone ?: ""
];

if (!$name || !$surname || !$email || !$password || !$confirmPassword || !$phone) {
    session_start();
    $_SESSION['missingData'] = $data;
    $_SESSION['message'] = "Compila tutti i campi";

    header('Location: ../pages/register.php');
} else {
    require '../db/db.php';

    $user = getUserByEmail($email);

    session_start();

    if ($user) {
        $_SESSION['emailAlreadyUsed'] = $data;
        $_SESSION['message'] = "Email già utilizzata";

        header('Location: ../pages/register.php');
    } else {
        if ($password != $confirmPassword) {
            $_SESSION['passwordsNotMatching'] = $data;
            $_SESSION['message'] = "Le password non corrispondono";

            header('Location: ../pages/register.php');
        } else {
            insertUser($name, $surname, $email, $password, $phone);

            header('Location: ../index.php');
        }
    }
}