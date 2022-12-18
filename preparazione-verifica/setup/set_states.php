<?php
if (!isset($_SESSION['states'])) {
    $states = array(
        array("name" => "Italy", "age" => 18),
        array("name" => "USA", "age" => 21),
        array("name" => "France", "age" => 19),
        array("name" => "Germany", "age" => 16),
        array("name" => "Spain", "age" => 14),
        array("name" => "UK", "age" => 32),
        array("name" => "Russia", "age" => 2),
        array("name" => "China", "age" => 20),
    );

    $_SESSION['states'] = $states;
}
