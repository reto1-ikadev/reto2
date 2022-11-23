<?php

include_once "../Db/favoritos_db.php";

session_start();

if(isset($_GET['id'])){
    $id = $_GET['id'];
    $numEmple = $_SESSION['usuario']['numEmple'];

    
    if(respuestaFav($id,$numEmple)){
        deleteRespFav($id,$numEmple);  
    }else{
        insertRespFav($id,$numEmple);
    }
}

require_once '../views/misRespuestas.view.php';
?>