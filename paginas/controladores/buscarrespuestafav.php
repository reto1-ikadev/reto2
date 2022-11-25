<?php

header('Content-Type: application/json');
include_once $_SERVER['DOCUMENT_ROOT'] . "/Db/favoritos_db.php";
session_start();
$id = $_GET['id'];
$numEmple = $_SESSION['usuario']['numEmple'];


$respuestas_favoritas = respuestaFav($id,$numEmple);



echo json_encode($respuestas_favoritas);
