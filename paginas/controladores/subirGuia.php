<?php
include_once "../Db/respuesta_db.php";

$target_file = "../archivosGuardados/" . basename($_FILES["archivos"]["name"]);


if(isset($_GET['titulo'])){
    echo $_FILES["archivos"]["name"];

    

}

include_once require_once '../views/subirGuia.view.php';
