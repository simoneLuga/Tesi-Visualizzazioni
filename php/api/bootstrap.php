<?php

require_once("../../db/database.php");
define("IMG_DIR", "../../img/");
session_start();
$dbh = new DatabaseHelper("localhost", "dafault_user", "Passtest0.", "data_visualizzation", 3306);
?>