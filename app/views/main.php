<?php 
include 'Db/db.php';
header('Content-Type: application/json');
    $nombre = $_POST['nombre'];
    $apellido = $_POST['apellido'];
    $correo = $_POST['correo'];
    $pass = $_POST['pass'];
    $departamento =$_POST['departamento'];
    $numEmp =12347;

    if($nombre === '' || $apellido === '' || $correo === '' ||
         $pass === ''){
            echo json_encode(['error' => 'Todos los campos son obligatorios']);
    }else{
      $dbh = connect();

      $sql = $dbh -> prepare( "INSERT INTO usuario VALUES(:nombre, :correo, :numEmp)");
      $datos = ["nombre" => $nombre, 'correo'=> $correo, 'numEmp' =>$numEmp];
      $sql -> execute($datos);
      
      echo json_encode(['success' => 'Datos guardados correctamente']);
    }

?>