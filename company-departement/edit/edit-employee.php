<!DOCTYPE html>
<?php
require "../db.php";

if (!isset($_POST['submit'])) {
    $employee = DBCompany::run("SELECT * FROM employee WHERE id = ?", $_GET['id'])->fetch();

    $name = $employee['firstName'];
    $surname = $employee['lastName'];
    $departement_id = $employee['departement_id'];
} else {
    $firstName = filter_input(INPUT_POST, 'firstName', FILTER_SANITIZE_STRING);
    $lastName = filter_input(INPUT_POST, 'lastName', FILTER_SANITIZE_STRING);
    $departement = filter_input(INPUT_POST, 'departement', FILTER_SANITIZE_NUMBER_INT);

    if (!$firstName || !$lastName || !$departement) {
        echo "<h4>Errore: inserisci tutti i campi</h4>";
    } else {
        DBCompany::run("UPDATE employee SET firstName = ?, lastName = ?, departement_id = ? WHERE id = ?",
            $firstName, $lastName, $departement, $_GET['id']);

        header("Location: ../list/list-films.php");
    }
}
?>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>Modifica Dipendente</title>

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
                    <label for="firstName" class="form-label">Nome</label>
                    <input type="text" class="form-control" id="firstName" name="firstName" placeholder="Nome"
                           value="<?= $name ?>" required>
                </div>

                <div class="mb-3">
                    <label for="lastName" class="form-label">Cognome</label>
                    <input type="text" class="form-control" id="lastName" name="lastName" placeholder="Cognome"
                           value="<?= $surname ?>" required>
                </div>

                <div class="mb-3">
                    <label for="departement" class="form-label">Dipartimento</label>
                    <select class="form-select" id="departement" name="departement" required>
                        <?php $departements = DBCompany::run("SELECT * FROM departement")->fetchAll();
                        foreach ($departements as $departement): ?>
                            <option value=<?= $departement['id'] ?> <?php if ($departement['id'] == $departement_id) echo "selected"; ?>>
                                <?= $departement['departementName'] . " - " . $departement['departementLocation'] ?>
                            </option>
                        <?php endforeach; ?>
                    </select>
                </div>

                <div>
                    <button class="btn btn-ok" type="submit" name="submit" id="submit">Modifica dipendente</button>
                    <a class="btn btn-danger" href="../list/list-employees.php">Annulla</a>
                </div>
            </form>
        </div>
    </div>
</div>

</body>
</html>