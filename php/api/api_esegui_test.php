<?php
require_once 'bootstrap.php';
$templateParams['ok'] = false;
if (isset($_GET['idTest'])) {
    $pagine = $dbh->get_pagine_test($_GET['idTest']);
    if($pagine!=null){
        $templateParams['idTest'] = $_GET['idTest'];
        $templateParams['pages'] = json_encode($pagine);
        $templateParams['ok'] = json_encode($dbh->get_ifActive($_GET['idTest']));
    }
}
require '../page/esegui_test.php';