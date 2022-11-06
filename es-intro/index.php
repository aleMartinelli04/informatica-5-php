<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Es Intro</title>

    <!-- Bootstrap CSS and JS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/css/bootstrap.min.css"
          integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">

</head>
<body>
<div class="container">
    <table class="table">
        <thead>
        <tr>
            <th scope="col">Id</th>
            <th scope="col">Name</th>
            <th scope="col">Surname</th>
            <th scope="col">Address</th>
        </tr>
        </thead>
        <tbody>
        <?php
        $firstNames = array("Mario", "Luigi");
        $lastNames = array("Rossi", "Bianchi");
        $addresses = array("Via Roma", "Via Milano");

        session_start();
        $_SESSION['firstNames'] = $firstNames;
        $_SESSION['lastNames'] = $lastNames;
        $_SESSION['addresses'] = $addresses;

        for ($i = 0; $i < 2; $i++) {
            echo "
            <tr>
                <td><b>'$i'</b></td>
                <td>'$firstNames[$i]'</td>
                <td>'$lastNames[$i]'</td>
                <td>'$addresses[$i]'</td>
                <td>
                    <form name = 'index' action = 'utils/printNames.php' method = 'post'>
                        <input type = 'submit' value = 'STAMPA' class='btn btn-primary'>
                        <input type = 'hidden' name = 'check' value = '$i'>
                    </form>
                </td>
            </tr>
            ";
        }
        ?>
        </tbody>
    </table>
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