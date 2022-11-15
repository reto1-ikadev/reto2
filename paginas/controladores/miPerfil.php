<?php
ini_set('display_errors', 1);

ini_set('display_startup_errors', 1);

error_reporting(E_ALL);
    session_start();
//Para hacer pruebas en el navegador hay que pasarle ?accion=cargar
    include_once "../Db/db.php";
    
    if(isset($_GET["accion"]) && $_GET["accion"] != ''){
        //Necesito el num de empleado con el que ha iniciado sesion. Como no tengo la parte del código, voy a establecer una variable
        // $nume = 12346; despues lo cogere de $_SESSION
        //session_destroy();
        if(!isset($_SESSION['usuario']['nombre'])){
            $numEmple = obtenerNumEmple();

            if(isset($numEmple)){
                //Tengo que solicitar a la base de datos los datos del usuario
                $datos = selectUsuarioById($numEmple); 
                //El objeto datos, lo utilizo en miPerfil.view.php para asignar el valor al input
                 añadirDatosAsession($datos);
                
            }
        }
        
    }
    function añadirDatosAsession($datos){
        foreach ($datos as $key => $value) {
            $_SESSION[$key] = $value;
        }
    }
    
    function selectUsuarioById($numEmple){
       
        $dbh = connect();

        $stmt = $dbh->prepare("SELECT * FROM empleado WHERE numEmple = :numEmple");
        $stmt ->setFetchMode(PDO::FETCH_OBJ);
        $data = array(
            "numEmple" => $numEmple
        );
        $stmt->execute($data);
        return $stmt->fetchObject();
    }

    function obtenerNumEmple(){
        if(isset($_SESSION['usuario'])){
            $session = $_SESSION['usuario'];
            //print_r($numUsu);
            foreach ($session as $usuario => $value) {
                $numEmple = $value;
            }
        }
        return $numEmple;
    }

    require_once "../views/miPerfil.view.php";
?>


