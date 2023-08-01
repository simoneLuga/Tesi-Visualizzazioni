<?php 

require_once 'bootstrap.php';
if($_SESSION['type']){
if (isset($_POST['idPage'])) {
    $users = $dbh->get_all_anonymous_users($_POST['idPage']);
    echo json_encode($users);
}
} else { //non autorizzato
    header('Content-Type: application/json');
    echo json_encode("Accesso negato.");
}