<?php 
    $nombre = $_POST['nombre'];
    $apellido = $_POST['apellido'];
    $correo = $_POST['correo'];
    $pass = $_POST['pass'];
    $departamento =$_POST['departamento'];
    

    if($nombre === '' || $apellido === '' || $correo === '' ||
         $pass === ''){
            echo json_encode('Llena todos los campos');
    }else{
        echo json_encode('Correcto:'.$nombre);
    }

?>