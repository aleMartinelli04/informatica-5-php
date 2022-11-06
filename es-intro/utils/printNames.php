<?php
$i = $_POST['check'];

session_start();
echo "
Ciao sono " . $_SESSION['firstNames'][$i] . " " . $_SESSION['lastNames'][$i] . " e vivo a " . $_SESSION['addresses'][$i] . "
";
