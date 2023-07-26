<?php
require_once 'bootstrap.php';

$result = false;
if (isset($_POST['idPadre'], $_POST["type"])) {
    $idPadre = $_POST['idPadre'];
    $type = $_POST["type"];
    if ($type == "photo") {

        $filename =  $_FILES['src']['name'];
        $extension = pathinfo($filename, PATHINFO_EXTENSION);
        $extension = strtolower($extension);
        
        // Valid extensions
        $valid_ext = array("jpg", "png", "jpeg");
        
        $id_page = $dbh->save_new_visualizzation_noPhoto($idPadre);
        $location = $_SESSION['IdUtente'] . "_" . $idPadre ."_" . $id_page . "." . $extension;
        if (in_array($extension, $valid_ext)) {
            if (move_uploaded_file($_FILES['src']['tmp_name'], IMG_DIR . $location)) {
                if ($dbh->updateimg_view($id_page, $location)) {
                    $result = true;
                }
            }
        }
    } else {

        if($dbh->save_new_visualizzation_link($idPadre, $_POST["src"])){
            $result = true;
        }
    }
}
return $result;