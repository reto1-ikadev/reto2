<?php
header('Content-Type: application/json');
include_once $_SERVER['DOCUMENT_ROOT'] . "/Db/guias_db.php";

$archivo = $_GET['id'];

$guia = selectArchivo($archivo);

$datos = ["archivo" => $guia];

//enviar $preguntas al archivo js paginaPrincipal
echo json_encode($datos);