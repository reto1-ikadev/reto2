<?php


include_once "../Db/respuesta_db.php";
include_once "../Db/pregunta_db.php";

if(isset($_GET['titulo'])){
    $titulo = $_GET['titulo'];
}
if(isset($_GET['id'])){
    $id = $_GET['id'];
    
   $respuesta = selectRespuestaPorIdPregunta($id);
   //necesito el nombre del empleado.
   
   $pregunta = selectPreguntaPorIdPregunta($id);
}

require_once '../views/misRespuestas.view.php';
?>