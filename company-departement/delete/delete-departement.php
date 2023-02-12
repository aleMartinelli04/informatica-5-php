<?php
$departement_id = $_GET['id'];

require "../db.php";

try {
    DBCompany::run("DELETE FROM departement WHERE id = ?", $departement_id);

    header("Location: ../list/list-departements.php");

} catch (PDOException $e) {
    echo "<h3>Impossibile eliminare il dipartimento</h3>";
    echo "<a href='../list/list-departements.php'>Torna indietro</a>";
}
