<?php
require_once 'bootstrap.php';
if (isset($_SESSION['type'])){
    if (isset($_POST['idTest'])) {
        $pagine = $dbh->get_pagine_test($_POST['idTest']);
        echo json_encode($pagine);
    }
} else { //non autorizzato
    header('Location: ../index.php');
}