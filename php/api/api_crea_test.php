<?php
require_once 'bootstrap.php';
if ($_SESSION['type']) {
    $templateParams['isMod'] = false;
    require '../page/crea_test.php';
} else { //non autorizzato
    header('Location: ../index.php');
}
?>