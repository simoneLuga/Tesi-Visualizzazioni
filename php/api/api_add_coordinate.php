<?php

require_once 'bootstrap.php';

$result = false;
if (isset($_POST['coord_x'],$_POST['coord_y'],$_POST['idPage'],$_POST['uuid'])) {
    if ($dbh->save_test_X($_POST['idPage'],$_POST['coord_x'],$_POST['coord_y'],$_POST['uuid'])) {
        $result = true;
    }
}
return $result;