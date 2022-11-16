<?php
    require "Db/db.php";
    
    session_start();
    $response = false;
    $dbh = connect();
    
    if(!isset($_COOKIE['acceptCookies'])) {
        if(isset($_POST['aceptar'])) {
            if(!trim($_POST['usuario']) == "" && !trim($_POST['pass']) == "") {
                $response = validateLogin($dbh, trim($_POST['usuario']), $_POST['pass']);
                if($response == "correcto") {
                    echo "<script src=\"js/cookies.js\"></script>";
                    //86400 -> 1 dia
                    setcookie("user", trim($_POST['usuario']), time() + (86400 * 60), "/");
                    setcookie("pass", $_POST['pass'], time() + (86400 * 60), "/");
                    $_SESSION["usuario"] = array();
                    $_SESSION["usuario"]["numEmple"] = trim($_POST['usuario']);
                    require "views/pprincipal.view.php";
                    die();
                }
            } else {
                $response = "Hay que completar todos los campos por favor.";
            }
        } 
    } else {
        $response = validateLogin($dbh, $_COOKIE['user'], $_COOKIE['pass']);
        if($response == "correcto") {
            $_SESSION["usuario"] = array();
            $_SESSION["usuario"]["numEmple"] = trim($_POST['usuario']);
            require "views/pprincipal.view.php";
            die();
        } else { // En caso de que las cookies no coincidan con los datos
            //de inicio de sesion estas se borraran.
            setcookie('acceptCookies', null, -1, '/');
            setcookie('user', null, -1, '/');
            setcookie('pass', null, -1, '/'); 
        }
    }

    require "views/login.view.php";

?>