<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
    include "../Db/empleado_db.php";
    
    if(isset($_POST['aceptar'])) {
        registeruser($_POST['nombre'], $_POST['apellido'], $_POST['correo'], $_POST['num'], $_POST['pass'], $_POST['depar']);
        require "login.php";
    }

    function addEmpleado(){

       header('Content-Type: application/json');

       try {
          $result = registeruser($_POST['nombre'], $_POST['apellido'], $_POST['correo'], $_POST['num'], $_POST['pass'], $_POST['depar']);
          $text = ['success' => $result];

       } catch(Exception $err) {
           echo $err->getMessage();
       }
   
       }

    require "../views/registro.view.php";

?>  