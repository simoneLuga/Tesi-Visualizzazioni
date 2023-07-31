<?php

require_once 'bootstrap.php';

if (isset($_POST['idPage'], $_POST['IDUtenteAnonimo'])) {
    $registrazioni = $dbh->get_registrazioni_test($_POST['idPage'], $_POST['IDUtenteAnonimo']);
    echo json_encode($registrazioni);
}