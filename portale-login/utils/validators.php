<?php
function validateMail($mail)
{
    return filter_var($mail, FILTER_VALIDATE_EMAIL) && strlen($mail) <= 64;
}

function validatePassword($password)
{
    return strlen($password) >= 8 && strlen($password) <= 64;
}

function validateName($name)
{
    return strlen($name) >= 3 && strlen($name) <= 32;
}

function validateSurname($surname)
{
    return strlen($surname) >= 3 && strlen($surname) <= 32;
}

function validateCF($cf)
{
    return strlen($cf) == 16;
}

function validateInfo($info)
{
    return strlen($info) <= 128;
}

function validateRegister($mail, $password, $confermaPassword, $nome, $cognome, $cf, $info)
{
    return validateMail($mail) && validatePassword($password) && validatePassword($confermaPassword) &&
        validateName($nome) && validateSurname($cognome) && validateCF($cf) && validateInfo($info) && $password == $confermaPassword;
}
