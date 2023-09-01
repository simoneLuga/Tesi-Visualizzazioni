<?php
require_once 'bootstrap.php';
if ($_SESSION['type']) {
    if (isset($_POST['idTest'], $_POST['testName'])) {
        $pagine = $dbh->get_pagine_test($_POST['idTest']);
        if($pagine!=null){
            $templateParams['idTest'] = $_POST['idTest'];
            $templateParams['testName'] = $_POST['testName'];
            $templateParams['pages'] = $pagine;
            $templateParams['isMod'] = true;
        }
        require '../page/crea_test.php';
    }
} else { //non autorizzato
    header('Location: ../index.php');
}
?>