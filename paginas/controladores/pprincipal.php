<?php
ini_set('display_errors', 1);
require_once $_SERVER['DOCUMENT_ROOT'].'/Db/db.php';
include_once "../Db/pregunta_db.php";
include_once "../Db/respuesta_db.php";
include_once "../Db/favoritos_db.php";

//mostrar pregunta
if(isset($_GET['id'])){
    $id = $_GET['id'];
    $numEmple = $_GET['numEmple'];
    if(preguntaFav($id,$numEmple)){
        deleteFav($id,$numEmple);
    }else{
        insertFav($id,$numEmple);
    }
}

//funcion mostrar pregunta
function mostrarPreguntas(){
$preguntas = selectPregunta();

$respuesta ="";
    foreach($preguntas as $pregunta){
        $resPregu ="";
        foreach(selectRespuesta($pregunta->id) as $resPregun){
            $resPregu = $resPregun->contenido;
        }

        $respuesta .= "<div id={$pregunta->id} class=pregunta>";
        $respuesta .="<div class=contPregunta>";
        $respuesta .= "<p><h3>Titulo</h3> <span>{$pregunta->titulo}</span>";
        $respuesta .= "<h5>TAGS:</h5> <span>{$pregunta->tags}</span>";
        if(preguntaFav($pregunta->id,12345)){
        $respuesta .= "<span name=fav  id={$pregunta->id} class='material-symbols-outlined fav'>star</span>";
        }else{
        $respuesta .= "<span name=fav  id={$pregunta->id}  class='material-symbols-outlined'>star_border</span>";
        }
        $respuesta .= "</p>";
        $respuesta .="</div>";
        $respuesta .="<div class=contRespuesta>";
        $respuesta .= "<p><b>Ult. Resp:</b>&nbsp; <span>{$resPregu}</span> </p>";  
        $respuesta .= "<span name=ampliar id={$pregunta->id} class='material-symbols-outlined expandir'>unfold_more</span>";
        $respuesta .= "</div>";
        $respuesta .="</div>";
        $respuesta .= "<br>";

    }
   echo $respuesta;
}


require_once $_SERVER['DOCUMENT_ROOT'].'/views/pprincipal.view.php';





