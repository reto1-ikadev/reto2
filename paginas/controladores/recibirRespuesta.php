<?php
session_start();
include_once "../Db/respuesta_db.php";
header('Content-Type: application/json');
$contenido = $_POST['contenido'];
$idPregunta = $_POST['id'];
$usuario = $_SESSION['usuario']['numEmple'];


if ($contenido === '') {
  echo json_encode(['error' => 'Todos los campos son obligatorios']);
} else {
  //$usuarios = consultarCorreo($correo);
   $result = insertRespuesta($contenido, $idPregunta,$usuario);
   if($result){
    echo json_encode(['success' => "Respuesta añadida "]);
   }else{
    echo json_encode(['error' => 'No se ha podido añadir la respuesta']);
   }
  }

?>