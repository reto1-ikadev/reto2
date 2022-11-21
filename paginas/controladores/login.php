<?php
    session_start();
    require_once $_SERVER['DOCUMENT_ROOT'] . "/Db/empleado_db.php";
    $response = false;
    
    if(!isset($_COOKIE['acceptCookies'])) {
        if(isset($_POST['aceptar'])) {
            if(!trim($_POST['usuario']) == "" && !trim($_POST['pass']) == "") {
                $response = validateLogin(trim($_POST['usuario']), $_POST['pass']);
                if($response == "correcto") {
                    echo "<script src=\"/js/cookies.js\"></script>";
                    //86400 -> 1 dia
                    setcookie("user", trim($_POST['usuario']), time() + (86400 * 60), "/");
                    setcookie("pass", $_POST['pass'], time() + (86400 * 60), "/");
                    $_SESSION["usuario"] = array();
                    $_SESSION["usuario"]["numEmple"] = trim($_POST['usuario']);
                    print_r($_SESSION);
                    require $_SERVER['DOCUMENT_ROOT'] . "/controladores/pprincipal.php";
                    die();
                }
            } else {
                $response = "Hay que completar todos los campos por favor.";
            }
        } 
    } else {
        $response = validateLogin($_COOKIE['user'], $_COOKIE['pass']);
        if($response == "correcto") {
            $_SESSION["usuario"] = array();
            $_SESSION["usuario"]["numEmple"] = $_COOKIE['user'];
            require $_SERVER['DOCUMENT_ROOT'] . "/controladores/pprincipal.php";
            die();
        } else { 
            $response = "";
            // En caso de que las cookies no coincidan con los datos
            //de inicio de sesion estas se borraran.
            setcookie('acceptCookies', null, -1, '/');
            setcookie('user', null, -1, '/');
            setcookie('pass', null, -1, '/'); 
        }
    }

    require $_SERVER['DOCUMENT_ROOT'] . "/views/login.view.php";


