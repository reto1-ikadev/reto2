<?php

header('Content-Type: application/json');
include_once $_SERVER['DOCUMENT_ROOT']."/Db/pregunta_db.php";

$preguntas = selectPregunta();


//enviar $preguntas al archivo js pprincipal
 echo json_encode($preguntas);