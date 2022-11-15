<?php
require "Db/db.php";

$response = false;

if (isset($_POST['aceptar'])) {
    $dbh = connect();
    if (!trim($_POST['usuario']) == "" && !trim($_POST['pass']) == "") {
        $response = validateLogin($dbh, trim($_POST['usuario']), trim($_POST['pass']));
        if ($response == true) {
            require "controladores/pprincipal.php";
            die();
        }
    } 
    else {
        $response = "Hay que completar todos los campos por favor.";
    }
}

require "views/login.view.php";
