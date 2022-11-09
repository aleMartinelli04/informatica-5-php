<?php

// filter_input va a prendere i nomi dei campi del form
// ne prende i valori e ritorna il valore o false se non esiste
$price = filter_input(INPUT_GET, 'price', FILTER_VALIDATE_FLOAT);
$train = filter_input(INPUT_GET, 'train', FILTER_VALIDATE_FLOAT);

?>

<?php if ($price && $train) : ?>
    <div class="container mt-5">
        <h4 style="text-align: center">
            <label for="price">Il prezzo del biglietto è: <?php echo $price * $train; ?></label>
        </h4>
    </div>

<?php else: ?>
    <div class="container mt-5">
        <h4 style="text-align: center">
            <label for="price">Inserisci i dati richiesti</label>
        </h4>
    </div>

<?php endif; ?>