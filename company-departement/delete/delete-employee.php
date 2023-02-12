<?php
$employee_id = $_GET['id'];

require "../db.php";

DBCompany::run("DELETE FROM employee WHERE id = ?", $employee_id);

header("Location: ../list/list-employees.php");