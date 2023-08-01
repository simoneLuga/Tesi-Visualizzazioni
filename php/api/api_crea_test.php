<?php
    require_once 'bootstrap.php';
    if($_SESSION['type']){
    require '../page/crea_test.php';

} else { //non autorizzato
    header('Content-Type: application/json');
    echo json_encode("Accesso negato.");
}
?>