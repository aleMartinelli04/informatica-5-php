<!DOCTYPE html>
<?php require "../db.php" ?>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>Mostra Impiegati</title>

    <!-- Bootstrap 5 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <style>
        tr > td {
            width: 25%;
        }
    </style>
</head>
<body>
<div class="d-flex align-items-center min-vh-100">
    <div class="container-fluid text-center">
        <div class="container">
            <table class="table">
                <thead>
                <tr>
                    <th scope="col">ID</th>
                    <th scope="col">Nome</th>
                    <th scope="col">Cognome</th>
                    <th scope="col">Nome dipartimento</th>
                    <th scope="col">Azioni</th>
                </tr>
                </thead>
                <tbody>
                <?php
                $employees = DBCompany::run(
                    "SELECT employee.id, employee.firstName, employee.lastName, departement.departementName FROM employee 
    INNER JOIN departement ON employee.departement_id=departement.id")->fetchAll();
                foreach ($employees as $employee): ?>
                    <tr>
                        <th scope="row"><?= $employee['id'] ?></th>
                        <td><?= $employee['firstName'] ?></td>
                        <td><?= $employee['lastName'] ?></td>
                        <td><?= $employee['departementName'] ?></td>
                        <td>
                            <a href="../edit/edit-employee.php?id=<?= $employee['id'] ?>" class="btn btn-primary">Modifica</a>
                            <a href="../delete/delete-employee.php?id=<?= $employee['id'] ?>" class="btn btn-danger">Elimina</a>
                        </td>
                    </tr>
                <?php endforeach; ?>
                </tbody>
            </table>

            <a href="../index.html" class="btn btn-success">Back</a>
        </div>
    </div>
</div>

</body>
</html>