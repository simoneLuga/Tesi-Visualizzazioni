<?php
require_once 'bootstrap.php';
if ($_SESSION['type']) {
    if (isset($_POST['idTest'])) {
        $pagine = $dbh->get_pagine_test($_POST['idTest']);
        if($pagine!=null){
            $templateParams['idTest'] = $_GET['idTest'];
            $templateParams['pages'] = json_encode($pagine);
            $templateParams['isMod'] = true;
        }
        require '../page/crea_test.php';
    }
} else { //non autorizzato
    header('Location: ../index.php');
}
?>