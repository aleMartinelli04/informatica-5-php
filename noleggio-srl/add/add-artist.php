<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>Aggiungi Dipartimento</title>

    <!-- Bootstrap 5 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <link href="../style.css" type="text/css" rel="stylesheet">
</head>
<body>
<div class="d-flex align-items-center min-vh-100">
    <div class="container-fluid text-center">
        <div class="container">
            <?php
            if (isset($_POST['submit'])) {
                $name = filter_input(INPUT_POST, 'name', FILTER_SANITIZE_STRING);
                $location = filter_input(INPUT_POST, 'location', FILTER_SANITIZE_STRING);

                if (!$name || !$location) {
                    echo "<h4>Errore: inserisci tutti i campi</h4>";
                } else {
                    require_once "../db.php";

                    DBCompany::run("INSERT INTO departement(id, departementName, departementLocation) VALUES (DEFAULT, ?, ?)",
                        $name, $location);

                    echo "<h4>Dipartimento aggiunto con successo!</h4>";
                }
            }
            ?>
            <form method="post">
                <div class="mb-3">
                    <label for="name" class="form-label">Nome</label>
                    <input type="text" class="form-control" id="name" name="name" placeholder="Nome" required>
                </div>

                <div class="mb-3">
                    <label for="location" class="form-label">Luogo</label>
                    <input type="text" class="form-control" id="location" name="location" placeholder="Luogo" required>
                </div>

                <div>
                    <button class="btn btn-ok" type="submit" name="submit" id="submit">Aggiungi dipartimento</button>
                    <a class="btn btn-danger" href="../index.html">Back to black</a>
                </div>
            </form>
        </div>
    </div>
</div>

</body>
</html>