<?php
    require_once "../Db/empleado_db.php";

    if(isset($_POST['aceptar'])) {
        if(trim($_POST['numEmple']) != "" && trim($_POST['pass']) != "" && trim($_POST['pass2']) != "") {
            if($_POST['pass'] == $_POST['pass2']) {
                $response = recoverPass(connect(), trim($_POST['numEmple']), $_POST['pass']);
            } else {
                $response = "Las contraseñas no coinciden";
            }
            
        }
    }

    require_once "../views/contrasena.view.php";