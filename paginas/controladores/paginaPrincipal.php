<?php


include_once $_SERVER['DOCUMENT_ROOT']."/Db/favoritos_db.php";


session_start();

//mostrar pregunta
if(isset($_GET['id'])){
    $id = $_GET['id'];
    $numEmple = $_SESSION['usuario']['numEmple'];

    
    if(preguntaFav($id,$numEmple)){
        deletePregFav($id,$numEmple);  
    }else{
        insertPregFav($id,$numEmple);
    }
}
//funcion mostrar pregunta

require_once $_SERVER['DOCUMENT_ROOT'].'/views/paginaPrincipal.view.php';





