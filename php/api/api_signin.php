<?php
require_once 'bootstrap.php';

$result["signineseguito"] = false;

if (isset($_POST['email'], $_POST['password'])) {
    $email = $_POST['email'];
    $password = $_POST['password']; // Recupero la password criptata.
    if ($dbh->emailIsPresent($email)) {
        $result["erroresignin"] = "Email giá registrata.";
    } else {
        $random_salt = hash('sha512', uniqid(mt_rand(1, mt_getrandmax()), true));
        // Crea una password usando la chiave appena creata.
        $password = hash('sha512', $password . $random_salt);

        if ($dbh->signin($email, $password, $random_salt)) {
            $result["signineseguito"] = true;

        } else {
            $result["erroresignin"] = "Errore durante la registrazione. Riprovare.";
        }

    }
} else {
    $result["erroresignin"] = "Specificare tutti i dati.";
}



header('Content-Type: application/json');
echo json_encode($result);





?>