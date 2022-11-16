<?php

require "Db/db.php";
    session_start();
    $response = "nothing";
 
    if(isset($_POST['aceptar'])) {
        $dbh = connect();
        if(!trim($_POST['usuario']) == "" && !trim($_POST['pass']) == "") {
            $response = validateLogin($dbh, trim($_POST['usuario']), trim($_POST['pass']));
            if($response){
               
                $_SESSION['usuario'] = array();
                $_SESSION['usuario']['numEmple'] = trim($_POST['usuario']);
               
            }
        } else {
            $response = "Hay que completar todos los campos por favor.";
        }
        if($response ==true){
            require "views/pprincipal.view.php";
            die();
        }
       
    }
 
    require "views/login.view.php";

?>