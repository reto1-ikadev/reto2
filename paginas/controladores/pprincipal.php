<?php

include_once $_SERVER['DOCUMENT_ROOT']."/Db/pregunta_db.php";
include_once $_SERVER['DOCUMENT_ROOT']."/Db/respuesta_db.php";
include_once $_SERVER['DOCUMENT_ROOT']."/Db/favoritos_db.php";
include_once $_SERVER['DOCUMENT_ROOT']."/Db/empleado_db.php";

session_start();

//mostrar pregunta
if(isset($_GET['id'])){
    $id = $_GET['id'];
    $numEmple = $_SESSION['usuario']['numEmple'];

    
    if(preguntaFav($id,$numEmple)){
        deleteFav($id,$numEmple);
        header("Refresh:1");
    }else{
        insertFav($id,$numEmple);
        header("Refresh:0; url=/contoladores/pprincipal.php");
    }
    
}
//funcion mostrar pregunta

require_once $_SERVER['DOCUMENT_ROOT'].'/views/pprincipal.view.php';





