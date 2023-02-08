<?php
require "../db/pdo_singleton.php";
require "../utils/validators.php";

$nome = filter_input(INPUT_POST, 'nome');
$cognome = filter_input(INPUT_POST, 'cognome');
$codiceFiscale = filter_input(INPUT_POST, 'codiceFiscale');
$info = filter_input(INPUT_POST, 'info');
$email = filter_input(INPUT_POST, 'email');
$password = filter_input(INPUT_POST, 'password');
$confermaPassword = filter_input(INPUT_POST, 'confermaPassword');
print_r($_POST);
echo "HI";
$image = $_POST['immagine'];
echo gettype($image['tmp']);
echo $image;
$foto = base64_encode(file_get_contents($_POST['immagine']));
echo "foto: " . $foto;

//if (!validateRegister($email, $password, $confermaPassword, $nome, $cognome, $codiceFiscale, $info)) {
    echo "Inserisci i dati correttamente";
    echo "<br>";
    echo "Nome:" . $nome;
    echo "<br>";
    echo "Cognome:" . $cognome;
    echo "<br>";
    echo "Codice Fiscale:" . $codiceFiscale;
    echo "<br>";
    echo "Info:" . $info;
    echo "<br>";
    echo "Email:" . $email;
    echo "<br>";
    echo "Password:" . $password;
    echo "<br>";
    echo "Conferma Password:" . $confermaPassword;
    echo "<br>";
    echo "Foto:" . $foto;
//} else {
    $registered = DB::run("SELECT EXISTS(
        SELECT 1
        FROM utenti
        WHERE email = ?
    ) as MailExists;", $email)->fetch()['MailExists'];

    echo "Registered: " . $registered;

    if ($registered) {
        echo "Mail già registrata!";
    } else {
        DB::run("INSERT INTO utenti (nome, cognome, email, password, codiceFiscale, foto, informazioni) VALUES (?, ?, ?, ?, ?, ?, ?)",
            $nome, $cognome, $email, $password, $codiceFiscale, $foto, $info);
        echo "Registrazione avvenuta con successo!";
        echo '<a href="../profile.php">Vai al profilo</a>';
    }
//}
