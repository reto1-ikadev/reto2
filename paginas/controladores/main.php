<?php
include '../Db/db.php';
header('Content-Type: application/json');
$numEmple = $_POST['numEmple'];
$correo = $_POST['correo'];
$accion = $_POST["accion"];
$usuarios = [];

if (
  $correo === ''
) {
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


function updateUsuario($correo,$numEmple){
  $dbh = connect();
  $stmt = $dbh->prepare('UPDATE empleado SET correo = :correo WHERE numEmple = :numEmple');
  $data = array(
    "correo"=>$correo,
    "numEmple"=>$numEmple
  );
  return $stmt->execute($data); 
}
  

function consultarCorreo($correo){
 // $usuarios=[];
  $dbh = connect();
  $stmt = $dbh->prepare("SELECT numEmple FROM empleado WHERE correo = :correo");
  //si el numero de empleado coincide con el que está cargado, puedo hacer el update.
  //si el numero de empleado es distinto, el correo ya está asignado.
  $stmt->setFetchMode(PDO::FETCH_ASSOC);
  $data = array(
    "correo" => $correo
  );
  $stmt->execute($data);
  if($stmt->rowCount() >0){
  while($row = $stmt->fetch()){
    $usuarioDevuelto = $row['numEmple'];
    //array_push($usuarios, $usuarioDevuelto);
  }}
  if(isset($usuarioDevuelto)){
    return $usuarioDevuelto;
  }else{
    return 0;
  }
  
}

?>