<?php
require_once 'bootstrap.php';

if (isset($_POST['idTest'])) {
    return $dbh->del_test($_POST['idTest']);
}