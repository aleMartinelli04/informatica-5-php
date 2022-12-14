<?php

require "models.php";

$value = filter_input(INPUT_POST, "id", FILTER_SANITIZE_NUMBER_INT);

deleteElement(getConnection(), $value);

header("Location: index.php");