<?php
require_once 'bootstrap.php';

if (isset($_SESSION['type'])) {
    $templateParams['giaLoggato'] = true;
} else { //non autorizzato
    $templateParams['giaLoggato'] = false;
}
require '../page/ultima_pagina.php';