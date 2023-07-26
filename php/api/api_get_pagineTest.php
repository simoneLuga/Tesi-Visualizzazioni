<?php
require_once 'bootstrap.php';

if (isset($_POST['idTest'])) {
    $pagine = $dbh->get_pagine_test($_POST['idTest']);
    echo json_encode($pagine);
}