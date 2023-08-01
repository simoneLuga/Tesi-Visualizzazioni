<?php

require_once 'bootstrap.php';
$result = 1;
if($_SESSION['type']){
if (isset($_POST['idTest'],$_POST['attivo'])) {
    if ($dbh->AttivaDisattivaTest($_POST['idTest'],$_POST['attivo'])) {
        $result = 2;
    }
}
} else { //non autorizzato
    header('Content-Type: application/json');
    echo json_encode("Accesso negato.");
}
echo $result;