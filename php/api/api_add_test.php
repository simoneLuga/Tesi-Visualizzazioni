<?php
require_once 'bootstrap.php';

$result = false;
if($_SESSION['type']){
if (isset($_POST['title'])) {
    $title = $_POST['title'];
    $id_test = $dbh->save_new_test($title);
    echo $id_test;
}
} else { //non autorizzato
    header('Content-Type: application/json');
    echo json_encode("Accesso negato.");
}
