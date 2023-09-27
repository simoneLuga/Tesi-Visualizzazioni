<?php
require_once 'bootstrap.php';

$result = false;
if (isset($_SESSION['type'])) {
    if (isset($_POST['title'])) {
        $title = $_POST['title'];
        $id_test = $dbh->save_new_test($title);
        echo $id_test;
    }
} else { //non autorizzato
    header('Location: ../index.php');
}