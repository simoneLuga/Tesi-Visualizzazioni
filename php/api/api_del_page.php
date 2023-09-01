<?php
require_once 'bootstrap.php';

if ($_SESSION['type']) {
    if (isset($_POST['idPage'])) {
        $dbh->del_imgfromServerSinglePage($_POST['idPage']);
        return $dbh->del_Page($_POST['idPage']);
    }
} else { //non autorizzato
    header('Location: ../index.php');
}