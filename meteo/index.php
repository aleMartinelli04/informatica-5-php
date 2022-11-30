<?php
session_start();

if (!isset($_SESSION['cities'])) {
    $_SESSION['cities'] = array(
        'Trento' => 'Nord',
        'Milano' => 'Nord',
        'Torino' => 'Nord',
        'Firenze' => 'Centro',
        'Bologna' => 'Centro',
        'Roma' => 'Centro',
        'Napoli' => 'Sud',
        'Bari' => 'Sud',
        'Messina' => 'Sud');
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>Weather</title>

    <!-- Bootstrap 5 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>
<body>
<div class="container mt-5 mx-5">
    <form method="post" action="utils/saveMeteo.php">
        <!-- Select city -->
        <div class="row">
            <div class="col-12 col-md-6">
                <label for="city">City</label>
            </div>
            <div class="col-12 col-md-6">
                <select class="form-control w-100" id="city" name="city">
                    <option selected disabled>Select a city</option>

                    <?php foreach ($_SESSION['cities'] as $city => $_): ?>
                        <option value="<?= $city; ?>"><?= $city; ?></option>
                    <?php endforeach; ?>
                </select>
            </div>
        </div>

        <!-- Input max temperature -->
        <div class="row mt-5">
            <div class="col-12 col-md-6">
                <label for="max">Max temperature</label>
            </div>
            <div class="col-12 col-md-6">
                <input type="number" class="form-control w-100" id="max" name="max" placeholder="Max temperature"
                       step="0.5">
            </div>
        </div>

        <!-- Input min temperature -->
        <div class="row mt-5">
            <div class="col-12 col-md-6">
                <label for="min">Min temperature</label>
            </div>
            <div class="col-12 col-md-6">
                <input type="number" class="form-control w-100" id="min" name="min" placeholder="Min temperature"
                       step="0.5">
            </div>
        </div>

        <button type="submit" class="btn btn-primary mt-5">Submit</button>
    </form>

    <a href="utils/table.php" class="btn btn-primary mt-5">Full table</a>
    <a href="utils/recap.php" class="btn btn-primary mt-5">Recap</a>
</div>
</body>

</html>