<?php
include '../Db/db.php';

$numEmple = $_GET['numEmple'];
$idPregunta = $_GET['id'];

if ($idPregunta === '') {
    echo json_encode(['error' => 'Todos los campos son obligatorios']);
  } else {
    //$usuarios = consultarCorreo($correo);
     $result = updateUsuario($numEmple, $idPregunta);
     if($result==true){
      echo json_encode(['success' => "Favoriteado"]);
     }else{
      echo json_encode(['error' => 'Error al actualizar usuario']);
     }
    }


function updateUsuario($numEmple, $idPregunta){
    if(preguntaFav($idPregunta,$numEmple)){
    }
    else{
        $dbh = connect();
        $stmt = $dbh->prepare('INSERT INTO FAVORITOS (empleado_numEmple, pregunta_id ) VALUES (:numEmple, :idPregunta)');
        $data = array(
          "numEmple "=>$numEmple,
          "idPregunta"=>$idPregunta
        );
        return $stmt->execute($data);
  };
};
    