<?php
//Con estas líneas se muestran los errores de php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

session_start();//Para poder utilizar la sesion

    include_once "../Db/db.php";
    //Si recibimos accion. SIEMPRE VAMOS A RECIBIRLA, PORQUE ESTÁ EN LA RUTA
    if(isset($_GET["accion"]) && $_GET["accion"] != ''){
        if(!isset($_SESSION['usuario']['nombre'])){
            
            $numEmple = obtenerNumEmple();

            if(isset($numEmple)){
                $datos = selectUsuarioById($numEmple); 
                 añadirDatosAsession($datos);
                
            }
        }

        $misPreguntas = selectPreguntasUsuario($numEmple);
        print_r($misPreguntas); 
    }

    //AÑADIR MIS PREGUNTAS.

    function selectPreguntasUsuario($numEmple){
        $misPreguntas=[];
        $dbh = connect();

        $stmt = $dbh->prepare("SELECT id, titulo, contenido, fecha FROM pregunta WHERE empleado_numEmple = :numEmple");
        $stmt ->setFetchMode(PDO::FETCH_OBJ);
        $data = array(
            "numEmple" => $numEmple
        );
        $stmt->execute($data);
        $misPreguntas = [];

        while($row = $stmt->fetch()){
            
            $id = "pregunta_".strval($row->id);
            $titulo = $row->titulo;
            $contenido = $row->contenido;
            $fecha = $row->fecha;
            $p = array(
                "titulo" => $titulo,
                "contenido" => $contenido,
                "fecha" => $fecha
            );

            if(!isset($misPreguntas[$id])){
                $misPreguntas[$id] = [];
            }
            $misPreguntas[$id] = $p;
        }
        
        return $misPreguntas;
    }


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
/**
 * Funcion que guarda en una variable el numero de empleado que ha iniciado sesion
 * @return $numEmple -> Se obtiene de $_SESSION
 */
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


