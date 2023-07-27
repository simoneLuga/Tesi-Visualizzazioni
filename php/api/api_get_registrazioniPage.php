<?php

require_once 'bootstrap.php';

if (isset($_POST['idPage'])) {
    $registrazioni = $dbh->get_registrazioni_test($_POST['idPage']);
    echo json_encode($registrazioni);
}