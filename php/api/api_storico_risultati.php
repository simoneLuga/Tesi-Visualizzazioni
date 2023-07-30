<?php

require_once 'bootstrap.php';

$templateParams['page'] = json_decode($_POST['page'],true);
$templateParams['idUtenteAnonimo'] = $_POST['idUtenteAnonimo'];


require '../page/risultati.php';

