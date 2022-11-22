<?php

header('Content-Type: application/json');
include_once $_SERVER['DOCUMENT_ROOT'] . "/Db/guias_db.php";


$guia = selectGuias();
$datos = ["guia" => $guia];

//enviar $preguntas al archivo js pprincipal
echo json_encode($datos);
