<?php
session_start();

$_SESSION['people'] = array();

header('Location: ../table.php');
