<!DOCTYPE html>
<?php
require "../db.php";

if (!isset($_POST['submit'])) {
    $departement = DBCompany::run("SELECT * FROM departement WHERE id = ?", $_GET['id'])->fetch();

    $name = $departement['departementName'];
    $location = $departement['departementLocation'];
} else {
    $departementName = filter_input(INPUT_POST, 'departementName', FILTER_SANITIZE_STRING);
    $departementLocation = filter_input(INPUT_POST, 'departementLocation', FILTER_SANITIZE_STRING);

    if (!$departementName || !$departementLocation) {
        echo "<h4>Errore: inserisci tutti i campi</h4>";
    } else {
        DBCompany::run("UPDATE departement SET departementName = ?, departementLocation = ? WHERE id = ?",
            $departementName, $departementLocation, $_GET['id']);

        header("Location: ../list/list-artists.php");
    }
}
?>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>Modifica Dipartimento</title>

    <!-- Bootstrap 5 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <link href="../style.css" type="text/css" rel="stylesheet">
</head>
<body>
<div class="d-flex align-items-center min-vh-100">
    <div class="container-fluid text-center">
        <div class="container">
            <form method="post">
                <div class="mb-3">
                    <label for="departementName" class="form-label">Nome</label>
                    <input type="text" class="form-control" id="departementName" name="departementName"
                           placeholder="Nome"
                           value="<?= $name ?>" required>
                </div>

                <div class="mb-3">
                    <label for="departementLocation" class="form-label">Cognome</label>
                    <input type="text" class="form-control" id="departementLocation" name="departementLocation"
                           placeholder="Luogo" value="<?= $location ?>" required>
                </div>

                <div>
                    <button class="btn btn-ok" type="submit" name="submit" id="submit">Modifica dipartimento</button>
                    <a class="btn btn-danger" href="../list/list-departements.php">Annulla</a>
                </div>
            </form>
        </div>
    </div>
</div>

</body>
</html>