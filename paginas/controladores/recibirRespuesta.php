<?php
session_start();
include_once "../Db/respuesta_db.php";
header('Content-Type: application/json');
$contenido = $_POST['contenido'];
$idPregunta = $_POST['id'];
$usuario = $_SESSION['usuario']['numEmple'];


//move the file to the correct location
$target_file = "../archivosGuardados/" . basename($_FILES["archivos"]["name"]);

if ($contenido === '') {
  echo json_encode(['error' => 'Todos los campos son obligatorios']);
} else {
  if(($_FILES["archivos"])['size'] > 0) {
    if (move_uploaded_file($_FILES["archivos"]["tmp_name"], $target_file)) {
      $archivo_ruta = $target_file;
      $archivo_nombre = $_FILES["archivos"]["name"];
      $archivo_tipo = $_FILES["archivos"]["type"];
      $idRespuesta = insertRespuesta($contenido, $idPregunta,$usuario);
      $idArchivo = insertArchivo($archivo_ruta, $archivo_nombre, $archivo_tipo);
      insertArchivoRespuestas($idRespuesta, $idArchivo);
      echo json_encode(['success' => "El archivo se ha subido correctamente"]);
    } else {
      echo json_encode(['error' => 'Error al subir el archivo']);
    }
  }
  else{
    $result = insertRespuesta($contenido, $idPregunta,$usuario);
    if($result){
      echo json_encode(['success' => "Respuesta anadida "]);
     }else{
      echo json_encode(['error' => 'No se ha podido añadir la respuesta']);
     }
  }
}
?>