<?php

header('Content-Type: application/json');
include_once $_SERVER['DOCUMENT_ROOT']."/Db/favoritos_db.php";

$preguntas = todasFav();


//enviar $preguntas al archivo js paginaPrincipal
 echo json_encode($preguntas);