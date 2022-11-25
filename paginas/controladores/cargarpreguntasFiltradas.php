<?php

header('Content-Type: application/json');
include_once $_SERVER['DOCUMENT_ROOT'] . "/Db/pregunta_db.php";

$numPreguntas = countPreguntas();

if (isset($_GET['page']) && is_numeric($_GET['page']) && $_GET['page'] > 0 && $_GET['page'] <= $numPreguntas) {
    $page = $_GET['page'];
} else {
    $page = 1;
}

$titulo = $_POST['busqueda'];
$fechaInicio = $_POST['fechaInicio'];
$fechaFin = $_POST['fechaFinal'];
$tags = $_POST['tags'];


$preguntas = selectPreguntasFiltradas( $titulo, $page,$fechaInicio, $fechaFin, $tags);
$datos = ["preguntas" => $preguntas, "numPreguntas" => $numPreguntas];

//enviar $preguntas al archivo js paginaPrincipal
echo json_encode($datos);
