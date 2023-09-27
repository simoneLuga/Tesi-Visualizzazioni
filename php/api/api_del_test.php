<?php
require_once 'bootstrap.php';

if (isset($_SESSION['type'])) {
    if (isset($_POST['idTest'])) {
        $dbh->del_imgfromServer($_POST['idTest']);
        return $dbh->del_test($_POST['idTest']);
    }
} else { //non autorizzato
    header('Location: ../index.php');
}