<?php
$departement_id = $_GET['id'];

require "../db.php";

try {
    DBCompany::run("DELETE FROM departement WHERE id = ?", $departement_id);

    header("Location: ../list/list-artists.php");

} catch (PDOException $e) {
    echo "<h3>Impossibile eliminare il dipartimento</h3>";
    echo "<a href='../list/list-artists.php'>Torna indietro</a>";
}
