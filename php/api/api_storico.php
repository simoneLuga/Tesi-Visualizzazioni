<?php
require_once 'bootstrap.php';
if (isset($_SESSION['type'])) {
    if ($_SESSION["type"] == "C") {
        $templateParams['tests'] = $dbh->get_test_creator();
    } else {
        $templateParams['tests'] = $dbh->get_all_test();
    }
    require '../page/storico.php';
} else { //non autorizzato
    header('Location: ../index.php');
}
?>