<?php
include_once "../Db/pregunta_db.php";
ini_set('display_errors', 1);

ini_set('display_startup_errors', 1);

error_reporting(E_ALL);

if(isset($_GET['titulo']) && $_GET['titulo']!='' && $_GET['contenido'] && $_GET['contenido']!='' && $_GET['empleado']){
    //Si recibo los datos titulo, contenido y empleado del get. Los guardo
    $titulo = $_GET['titulo'];
    $contenido = $_GET['contenido'];
    $empleado = $_GET['empleado'];
    $tags = "";
    if(isset($_GET['tag1'])){
        $tags .= $_GET['tag1'];
    }
    if(isset($_GET['tag2'])){
        $tags .= $_GET['tag2'];
    }
    if(isset($_GET['tag3'])){
        $tags .=$_GET['tag3'];
    }
    if(isset($_GET['tag4'])){
        $tags .= $_GET['tag4'];
    }
    $fecha = date('d-m-Y');  
   $result = insertPregunta($titulo,$contenido,$empleado,$fecha,$tags);
   
    
}

require_once '../views/nPregunta.view.php';
?>