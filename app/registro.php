<?php
    
    require "Db/db.php";

    $response = "nothing";

    if(isset($_POST['aceptar'])) {
        $response = registerUser(connect(), $_POST['nombre'], $_POST['apellido'], $_POST['correo'], $_POST['num'], $_POST['pass'], $_POST['depar']);
    }

    require "views/registro.view.php";

?>