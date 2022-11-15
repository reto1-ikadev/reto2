<?php
    require "../Db/db.php";

$response = "nothing";

if(isset($_POST['aceptar'])) {
    $dbh = connect();
    if(!trim($_POST['usuario']) == "" && !trim($_POST['pass']) == "") {
        $response = validateLogin($dbh, trim($_POST['usuario']), trim($_POST['pass']));
    } else {
        $response = "Hay que completar todos los campos por favor.";
    }
    if($response == true){
        require "views/pprincipal.view.php";
        die();
    }
    
}

    require_once "../views/login.view.php";
?>