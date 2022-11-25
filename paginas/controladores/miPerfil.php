<?php
//Con estas líneas se muestran los errores de php


session_start();//Para poder utilizar la sesion
include_once "../Db/empleado_db.php";
include_once "../Db/pregunta_db.php";
include_once "../Db/respuesta_db.php";
include_once "../Db/favoritos_db.php";

    if(isset($_GET['idF'])){
        $id = $_GET['idF'];
        $numEmple = $_SESSION["usuario"]["numEmple"];
            deletePregFav($id,$numEmple); 
            //require_once 'miPerfil.php';
    }
    if(isset($_GET['idR'])){
        $id = $_GET['idR'];
        $numEmple = $_SESSION["usuario"]["numEmple"];
            deleteRespFav($id,$numEmple); 
            //require_once 'miPerfil.php';
    }
    if(isset($_GET['idB'])){
        $id = $_GET['idB'];
        deletePregunta($id); 
        //require_once 'miPerfil.php';
    }
    
    //Si recibimos accion. SIEMPRE VAMOS A RECIBIRLA, PORQUE ESTÁ EN LA RUTA
    
        if(!isset($_SESSION['usuario']['nombre'])){
        
            
            $numEmple = obtenerNumEmple();

            if(isset($numEmple)){
                $datos = selectUsuarioById($numEmple); 
                 añadirDatosAsession($datos);
                
            }
        }

        $misPreguntas = selectPreguntasUsuario($numEmple);
        
    
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

    function mostrarPreguntasFavoritos($numEmple){
        $preguntas = preguntaFavEmp($numEmple);
        $respuesta ="";
        foreach($preguntas as $pregunta){
            $titulos = selectPreguntaId($pregunta['pregunta_id']);   
            foreach($titulos as $titulo){    
                $respuesta .= "<div id={$pregunta['pregunta_id']} class=favorito>";
                $respuesta .= "<div class='pregunta'><h4>{$titulo->titulo}</h4>";
                $respuesta .= "</div><div><a class='ver' href='respuestas.php?id={$pregunta['pregunta_id']}'><span class='material-symbols-outlined'>visibility</span></a>&nbsp;<span id={$pregunta['pregunta_id']} name='favP' class='material-symbols-outlined fav'>delete</span>";
                $respuesta .= "</div>";
                $respuesta .= "</div>";
            }
           
        }
        echo $respuesta;
    }

    function mostrarRespuestasFavoritas($numEmple){
        $respuestas = respuestasFavEmp($numEmple);
        $salida ="";
        foreach($respuestas as $respuesta){
            $contenidos = selectRespuestaIdRespuesta($respuesta['id_respuesta']);   
            foreach($contenidos as $contenido){    
                $salida .= "<div id={$respuesta['id_respuesta']} class=favorito>";
                $salida .= "<div class='pregunta'><h4>{$contenido->contenido}</h4>";
                $salida .= "</div><div><a class='ver' href='respuestas.php?id={$contenido->pregunta_id}'><span class='material-symbols-outlined'>visibility</span></a>&nbsp;<span id={$respuesta['id_respuesta']} name='favR' class='material-symbols-outlined fav'>delete</span>";
                $salida .= "</div>";
                $salida .= "</div>";
            }
           
        }
        echo $salida;
    }

    

    require_once "../views/miPerfil.view.php";
    ?>

