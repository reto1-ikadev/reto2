<?php

header('Content-Type: application/json');
include_once $_SERVER['DOCUMENT_ROOT'] . "/Db/pregunta_db.php";

if(isset($_GET['id'])){
    $idPregunta = $_GET['id'];
}

$pregunta = selectPreguntaPorIdPregunta ($idPregunta);


$datos = ["pregunta" => $pregunta];

echo json_encode($datos);