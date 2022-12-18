<?php require_once 'setup/setup.php'; ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Preparazione Verifica</title>

    <!-- Bootstrap CSS and JS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/css/bootstrap.min.css"
          integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
</head>
<body>
<div class="container m-auto text-center">
    <form method="POST" action="scripts/save_user.php">
        <!-- Name field -->
        <div class="row mb-3 mt-5">
            <div class="col-12 col-md-6">
                <h3>
                    <label for="name">Name</label>
                </h3>
            </div>
            <div class="col-12 col-md-6">
                <input type="text" name="name" id="name" placeholder="Name" class="form-control w-100">
            </div>
        </div>

        <!-- Surname field -->
        <div class="row mb-3">
            <div class="col-12 col-md-6">
                <h3>
                    <label for="surname">Surname</label>
                </h3>
            </div>
            <div class="col-12 col-md-6">
                <input type="text" name="surname" id="surname" placeholder="Name" class="form-control w-100">
            </div>
        </div>

        <!-- Age field -->
        <div class="row mb-3">
            <div class="col-12 col-md-6">
                <h3>
                    <label for="age">Age</label>
                </h3>
            </div>
            <div class="col-12 col-md-6">
                <input type="number" min="0" max="120" step="1" name="age" id="age" placeholder="Age"
                       class="form-control w-100">
            </div>
        </div>

        <!-- State field -->
        <div class="row mb-5">
            <div class="col-12 col-md-6">
                <h3>
                    <label for="state">State</label>
                </h3>
            </div>
            <div class="col-12 col-md-6">
                <select name="state" id="state" class="form-control w-100">
                    <option selected disabled>Select a state</option>
                    <?php foreach ($_SESSION['states'] as $state): ?>
                        <option value="<?= $state['name'] ?>"><?= $state['name'] ?></option>
                    <?php endforeach; ?>
                </select>
            </div>
        </div>

        <!-- Buttons -->
        <div class="container-fluid p-auto">
            <button class="btn btn-primary" type="submit">Submit</button>
            <button class="btn btn-danger" type="reset">Reset</button>
            <a class="btn btn-success" href="table.php">View Table</a>
        </div>
    </form>
</div>
</body>
</html>
