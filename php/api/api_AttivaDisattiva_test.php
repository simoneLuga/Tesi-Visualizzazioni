<?php

require_once 'bootstrap.php';
$result = 1;
if ($_SESSION['type']) {
    if (isset($_POST['idTest'], $_POST['attivo'])) {
        if ($dbh->AttivaDisattivaTest($_POST['idTest'], $_POST['attivo'])) {
            $result = 2;
        }
    }
    echo $result;
} else { //non autorizzato
    header('Location: ../index.php');
}