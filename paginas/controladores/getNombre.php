<?php
include_once "../Db/empleado_db.php";
header('Content-Type: application/json');
session_start();
//select todo del usuario
$numEmple = $_SESSION['usuario']['numEmple'];

$datos = selectUsuarioById($numEmple);


echo json_encode($datos);

