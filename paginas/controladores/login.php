<?php    include "Db/empleado_db.php";
   
    $response = "nothing";
 if(isset($_SESSION['usuario'])){
            session_destroy();
        }
    if(isset($_POST['aceptar'])) {
        $_SESSION['usuario'] = array();
                $_SESSION['usuario']['numEmple'] = trim($_POST['usuario']);
                print_r($_SESSION['usuario']);
                require "pprincipal.php";
                die();
    }



require "views/login.view.php";
