<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Ricapitolazione biglietti</title>

    <!-- Bootstrap CSS and JS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/css/bootstrap.min.css"
          integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
</head>
<body>

<div class="container mt-5">
    <div class="container m-auto" style="width: 40%">
        <table class="table mt-3">
            <thead>
            <tr class="d-flex">
                <th scope="col" class="col-6">Nome</th>
                <th scope="col" class="col-6">Numero partecipanti</th>
            </tr>
            </thead>

            <tbody>
            <?php foreach ($_SESSION['events'] as $name => $partecipants): ?>
                <tr class="d-flex">
                    <td class="col-6"><?= $name ?></td>
                    <td class="col-6"><?= $partecipants ?></td>
                </tr>
            <?php endforeach; ?>

            <?php
            $total = 0;

            foreach ($_SESSION['events'] as $_ => $partecipants) {
                $total += $partecipants;
            }
            ?>

            <tr class="d-flex font-weight-bold">
                <td class="col-6">Tot</td>
                <td class="col-6"><?= $total ?></td>
            </tr>
            </tbody>
        </table>
    </div>

    <div class="container text-center mt-3">
        <h3>
            <?php
            if ($total == 0) {
                echo "Nessun evento prenotato";
            } else {
                $max = 0;
                $maxName = '';

                foreach ($_SESSION['events'] as $name => $partecipants) {
                    if ($partecipants > $max) {
                        $max = $partecipants;
                        $maxName = $name;
                    }
                }

                echo "Evento con più partecipanti: '$maxName' con $max partecipanti!";
            }
            ?>
        </h3>

        <a href="../index.php" class="btn btn-primary">Torna alla pagina iniziale</a>
        <a href="../utils/reset.php" class="btn btn-danger">Reset</a>
    </div>
</div>

<!-- Bootstrap JS -->
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
        integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo"
        crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"
        integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49"
        crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"
        integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy"
        crossorigin="anonymous"></script>
</body>
</html>