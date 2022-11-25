<?php
    require_once "../show_all_errors.php";
    include "../Db/empleado_db.php";
    

    $response = "nothing";

    if(isset($_POST['aceptar'])) {
        $response = registerUser($_POST['nombre'], $_POST['apellido'], $_POST['correo'], $_POST['num'], $_POST['pass'], $_POST['depar']);
    }

    require "../views/registro.view.php";

?>