<?php
require_once 'bootstrap.php';

if($_SESSION['type']){
if (isset($_POST['idTest'])) {
    return $dbh->del_test($_POST['idTest']);
}
} else { //non autorizzato
    header('Content-Type: application/json');
    echo json_encode("Accesso negato.");
}