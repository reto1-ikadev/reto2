<?php
    require "Db/db.php";
    
    session_start();
    $response = false;
    $dbh = connect();
    
    if(!isset($_COOKIE['acceptCookies'])) {
        if(isset($_POST['aceptar'])) {
            echo "<script src=\"js/cookies.js\"></script>";
            if(!trim($_POST['usuario']) == "" && !trim($_POST['pass']) == "") {
                $response = validateLogin($dbh, trim($_POST['usuario']), trim($_POST['pass']));
                if($response == true) {
                    //86400 -> 1 dia
                    setcookie("user", trim($_POST['usuario']), time() + (86400 * 60), "/");
                    setcookie("pass", password_hash($_POST['pass'], PASSWORD_DEFAULT), time() + (86400 * 60), "/");
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
        if($response == true) {
            $_SESSION["usuario"] = array();
            $_SESSION["usuario"]["numEmple"] = trim($_POST['usuario']);
            require "views/pprincipal.view.php";
            echo "Pag prin";
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