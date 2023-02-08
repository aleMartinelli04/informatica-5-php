<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>Portale Registrazioni</title>

    <!-- Bootstrap 5 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <link href="../style.css" rel="stylesheet" type="text/css">
</head>
<body style="background-color: whitesmoke">
<div class="d-flex align-items-center min-vh-100">
    <div class="container-fluid my-5 my-md-0">
        <!-- Login / Register -->
        <div class="w-75 m-auto text-center">
            <h2>Ciao!</h2>
            <p>Registrati qua o vai al <a href="../index.php">login</a> se sei già registrato!</p>
        </div>

        <form method="post" action="save_user.php" class="container w-75 m-auto">
            <!-- Nome e Cognome -->
            <div class="row w-100 m-auto">
                <div class="col-12 col-md-6">
                    <div class="w-100">
                        <label for="nome">Nome</label>
                    </div>
                    <input class="form-control" id="nome" name="nome" placeholder="Nome" autocomplete="off"
                           minlength="3" maxlength="32" type="text" style="padding: 10px">
                </div>

                <div class="col-12 col-md-6 mt-3 mt-md-0">
                    <div class="w-100">
                        <label for="cognome">Cognome</label>
                    </div>
                    <input class="form-control" id="cognome" name="cognome" placeholder="Cognome" autocomplete="off"
                           minlength="3" maxlength="32" type="text" style="padding: 10px" >
                </div>
            </div>

            <!-- Codice fiscale -->
            <div class="container mt-3">
                <label for="codiceFiscale">Codice Fiscale</label>
                <input class="form-control" id="codiceFiscale" name="codiceFiscale" placeholder="Codice Fiscale"
                       autocomplete="off"
                       minlength="16" maxlength="16" type="text" style="padding: 10px" >
            </div>

            <!-- Informazioni personali -->
            <div class="container mt-3">
                <label for="info">Informazioni Personali</label>
                <textarea class="form-control" id="info" name="info" placeholder="Informazioni Personali..."
                          autocomplete="off" maxlength="128" style="padding: 10px"></textarea>
            </div>

            <!-- Email -->
            <div class="container mt-3">
                <label for="email">Email</label>
                <input class="form-control" id="email" name="email" placeholder="Email" autocomplete="off"
                       maxlength="64" type="" style="padding: 10px" >
            </div>

            <!-- Password e Conferma-->
            <div class="row w-100 m-auto mt-3">
                <div class="col-12 col-md-6">
                    <div class="w-100">
                        <label for="password">Password</label>
                    </div>
                    <input class="form-control" id="password" name="password" placeholder="Password" autocomplete="off"
                           minlength="8" maxlength="64" type="password" style="padding: 10px" >
                </div>

                <div class="col-12 col-md-6 mt-3 mt-md-0">
                    <div class="w-100">
                        <label for="confermaPassword">Conferma Password</label>
                    </div>
                    <input class="form-control" id="confermaPassword" name="confermaPassword"
                           placeholder="Conferma Password" autocomplete="off"
                           minlength="8" maxlength="64" type="password" style="padding: 10px" >
                </div>
            </div>

            <!-- Immagine -->
            <div class="container mt-3">
                <div class="w-100">
                    <label for="immagine">Immagine</label>
                </div>
                <input class="form-control" id="immagine" name="immagine" type="file">
            </div>

            <!-- Register Button -->
            <div class="container m-auto mt-5">
                <button class="btn w-100 custom-button" type="submit">Registrati</button>
            </div>
        </form>
    </div>
</div>

</body>

</html>