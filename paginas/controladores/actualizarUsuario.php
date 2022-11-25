<?php
include_once "../Db/empleado_db.php";
header('Content-Type: application/json');
$numEmple = $_POST['numEmple'];
$correo = $_POST['correo'];
$accion = $_POST["accion"];
$usuarios = [];

if ($correo === '') {
  echo json_encode(['error' => 'Todos los campos son obligatorios']);
} else {
  //$usuarios = consultarCorreo($correo);
   $result = updateUsuario($correo, $numEmple);
   if($result==true){
    echo json_encode(['success' => "Usuario actualizado "]);
   }else{
    echo json_encode(['error' => 'Error al actualizar usuario']);
   }
  }

