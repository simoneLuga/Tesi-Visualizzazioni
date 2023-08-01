<?php
    require_once 'bootstrap.php';
    if($_SESSION['type']){
    if($_SESSION["type"]=="C"){
        $templateParams['tests'] = $dbh->get_test_creator();
    }else{
        $templateParams['tests'] = $dbh->get_all_test();
    }
    require '../page/storico.php';
} else { //non autorizzato
    header('Content-Type: application/json');
    echo json_encode("Accesso negato.");
}

    
?>