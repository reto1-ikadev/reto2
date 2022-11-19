<?php
    ini_set('display_errors', 1);
    ini_set('display_startup_errors', 1);
    error_reporting(E_ALL);
    include "../Db/empleado_db.php";
    

    $response = "nothing";

    if(isset($_POST['aceptar'])) {
        $response = registerUser($_POST['nombre'], $_POST['apellido'], $_POST['correo'], $_POST['num'], $_POST['pass'], $_POST['depar']);
    }

    require "../views/registro.view.php";

?>