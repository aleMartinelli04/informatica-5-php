<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Title</title>

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css"
          integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

    <style>
        li {
            font-size: 2.5rem;
        }

        a {
            color: black;
            text-decoration: none;
        }

        a:hover {
            color: red;
            text-decoration: none;
        }
    </style>

</head>
<body>

<div class="container">
    <div class="row">
        <div class="col-md-12">
            <h1>Pages in this project</h1>
            <ul style="font-size: 2.5rem">
                <?php
                $dirs = array_filter(glob('*'), 'is_dir');

                foreach ($dirs as $dir) {
                    echo "<li><a href='$dir'>$dir</a></li>";
                }
                ?>
            </ul>
        </div>
    </div>
</div>

<!-- Bootstrap JS -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"
        integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa"
        crossorigin="anonymous"></script>
</body>
</html>