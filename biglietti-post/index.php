<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Biglietti V2 - post</title>

    <!-- Bootstrap 5 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>
<body>

<?php
$price = filter_input(INPUT_POST, 'price', FILTER_VALIDATE_FLOAT);
$multiplier_name = filter_input(INPUT_POST, 'train');

if (!($price && $multiplier_name)) {
    $reply = "Inserisci i valori richiesti";
} else {
    $train_multiplier = explode(":", $multiplier_name)[0];
    $train_name = explode(":", $multiplier_name)[1];

    $price = $price * $train_multiplier;

    $reply = "<h4>Il Treno utilizzato è il " . $train_name . "</h4>";
    $reply .= "<h4>Il prezzo del biglietto è " . $price . "€</h4>";
}
?>

<div class="container mt-5">
    <form method="post">
        <div class="form-group">
            <!-- Price input -->
            <div class="row">
                <div class="col-12 col-md-6">
                    <h4>
                        <label for="price">Prezzo del biglietto</label>
                    </h4>
                </div>
                <div class="col-12 col-md-6">
                    <input class="form-control" id="price" name="price" placeholder="Prezzo" autocomplete="off">
                </div>
            </div>

            <!-- Train input -->
            <div class="row mt-5">
                <div class="col-12 col-md-6">
                    <h4>
                        <label for="trains">Scegli il tipo di treno utilizzato</label>
                    </h4>
                </div>
                <div class="col-12 col-md-6" style="text-align: center;">
                    <select name="train" id="trains" class="form-select w-100">
                        <option selected disabled>Scegli Treno</option>
                        <option value="0.7:Freccia Rossa Seconda Classe">Freccia Rossa Seconda classe</option>
                        <option value="1.2:Freccia Rossa Prima Classe">Freccia Rossa Prima classe</option>
                        <option value="2:Freccia Rossa Premium">Freccia Rossa Premium</option>
                    </select>
                </div>
            </div>

            <!-- Buttons -->
            <div class="container mt-5 mb-5" style="text-align: center">
                <button type="submit" class="btn btn-primary">Invia</button>
                <button type="reset" class="btn btn-danger">Annulla</button>
            </div>

            <hr>

            <!-- Result -->
            <div class="container mt-5" style="text-align: center">
                <?= $reply; ?>
            </div>
        </div>
    </form>
</div>


<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"
        integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p"
        crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js"
        integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF"
        crossorigin="anonymous"></script>
</body>
</html>