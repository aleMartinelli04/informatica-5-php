<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Database Intro</title>

    <!-- Bootstrap 5 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

</head>
<body>

<?php
// connection to db with PDO
try {
    require_once "connection.php";
    echo "Connection successful";
} catch (PDOException $e) {
    echo "Connection failed: " . $e->getMessage();
}
?>

<div class="container text-center mt-5">
    <form action="save_data.php" method="POST">
        <!-- name field -->
        <div class="mb-3">
            <label for="name" class="form-label">Name</label>
            <input type="text" class="form-control" id="name" name="name" placeholder="Enter your name">
        </div>

        <!-- surname field -->
        <div class="mb-3">
            <label for="surname" class="form-label">Surname</label>
            <input type="text" class="form-control" id="surname" name="surname" placeholder="Enter your surname">
        </div>

        <!-- cf field -->
        <div class="mb-3">
            <label for="cf" class="form-label">CF</label>
            <input type="text" class="form-control" id="cf" name="cf" placeholder="Enter your CF">
        </div>


        <!-- submit button -->
        <button type="submit" class="btn btn-primary">Submit</button>

        <!-- show button -->
        <a href="show_data.php" class="btn btn-primary">Show</a>

    </form>

</div>


</body>
</html>