<?php

header('Content-Type: application/json');
include_once $_SERVER['DOCUMENT_ROOT'] . "/Db/pregunta_db.php";

$numPreguntas = countPreguntas();

if (isset($_GET['page']) && is_numeric($_GET['page']) && $_GET['page'] > 0 && $_GET['page'] <= $numPreguntas) {
    $page = $_GET['page'];
} else {
    $page = 1;
}


$preguntas = selectPreguntas($page);
$datos = ["preguntas" => $preguntas, "numPreguntas" => $numPreguntas];

//enviar $preguntas al archivo js paginaPrincipal
echo json_encode($datos);

//enviar $preguntas al archivo js pprincipal
 echo json_encode($preguntas);