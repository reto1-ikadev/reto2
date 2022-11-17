<?php    include "Db/empleado_db.php";
   
    $response = "nothing";
 if(isset($_SESSION['usuario'])){
            session_destroy();
        }
    if(isset($_POST['aceptar'])) {
        if(!trim($_POST['usuario']) == "" && !trim($_POST['pass']) == "") {
            $response = validateLogin(trim($_POST['usuario']), trim($_POST['pass']));
            if($response == true) {
                
                $_SESSION['usuario'] = array();
                $_SESSION['usuario']['numEmple'] = trim($_POST['usuario']);
                require "pprincipal.php";
                die();
            }
        } else {
            $response = "Hay que completar todos los campos por favor.";
        }
    }



require "views/login.view.php";
