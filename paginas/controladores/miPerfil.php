<?php
//Con estas líneas se muestran los errores de php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

session_start();//Para poder utilizar la sesion

    include_once "../Db/pregunta_db.php";
    include_once "../Db/empleado_db.php";

    //Si recibimos accion. SIEMPRE VAMOS A RECIBIRLA, PORQUE ESTÁ EN LA RUTA
    if(isset($_GET["accion"]) && $_GET["accion"] == 'cargar'){
        if(!isset($_SESSION['usuario']['nombre'])){
        
            
            $numEmple = obtenerNumEmple();

            if(isset($numEmple)){
                $datos = selectUsuarioById($numEmple); 
                 añadirDatosAsession($datos);
                
            }
        }

        $misPreguntas = selectPreguntasUsuario($numEmple);
        
    }
    if(isset($_GET['accion2'])&& $_GET['accion2']!=''){
        $id = $_GET['id'];
    }

    //AÑADIR MIS PREGUNTAS.
    /**
     * Funcion que añade a session los datos del usuario
     */
    function añadirDatosAsession($datos){
        foreach ($datos as $key => $value) {
            $_SESSION[$key] = $value;
        }
    }
    /**
     * Funcion que nos devuelve los datos del usuario 
     * @param $numEmple -> El numero del empleado.
     * @return Objeto
     */

/**
 * Funcion que guarda en una variable el numero de empleado que ha iniciado sesion
 * @return $numEmple -> Se obtiene de $_SESSION
 */
    function obtenerNumEmple(){
        if(isset($_SESSION['usuario'])){
            $session = $_SESSION['usuario'];
            //print_r($session);
            foreach ($session as $usuario => $value) {
                $numEmple = $value;
            }
         
        }
        return $numEmple;
    }

    require_once "../views/miPerfil.view.php";
?>


