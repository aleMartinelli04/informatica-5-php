<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Prenotazione Eventi</title>

    <!-- Bootstrap CSS and JS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/css/bootstrap.min.css"
          integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
</head>
<body>

<div class="container mt-5">
    <form method="post">
        <!-- Name input -->
        <div class="row">
            <div class="col-12 col-md-6">
                <h4>
                    <label for="name">Nome</label>
                </h4>
            </div>
            <div class="col-12 col-md-6">
                <input class="form-control" id="name" name="name" placeholder="Nome" autocomplete="off">
            </div>
        </div>

        <!-- Partecipants input -->
        <div class="row">
            <div class="col-12 col-md-6">
                <h4>
                    <label for="partecipants">Numero partecipanti</label>
                </h4>
            </div>
            <div class="col-12 col-md-6">
                <input class="form-control" id="partecipants" name="partecipants" placeholder="Numero partecipanti"
                       autocomplete="off">
            </div>
        </div>

        <!-- Buttons -->
        <div class="container mt-5 text-center">
            <button type="submit" class="btn btn-primary">Invia</button>
            <button type="reset" class="btn btn-danger">Annulla</button>
        </div>
    </form>

    <!-- Button to show results.php -->
    <div class="container mt-3 text-center">
        <a href="pages/results.php" class="btn btn-success">Mostra risultati</a>
    </div>

    <div class="container text-center mt-3">
        <h4>
            <?php
            $name = filter_input(INPUT_POST, 'name', FILTER_SANITIZE_STRING);
            $partecipants = filter_input(INPUT_POST, 'partecipants', FILTER_SANITIZE_NUMBER_INT);

            if (!$name || !$partecipants) {
                echo "Inserisci i dati";
            } else {
                if (isset($_SESSION['events'][$name])) {
                    $_SESSION['events'][$name] += $partecipants;
                } else {
                    $_SESSION['events'][$name] = $partecipants;
                }

                echo "Evento <span class='text-danger'>'$name'</span> aggiunto";
                echo "<br>";
                echo "Numero partecipanti: " . $_SESSION['events'][$name];
            }
            ?>
        </h4>
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