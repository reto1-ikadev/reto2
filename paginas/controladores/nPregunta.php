<?php
include_once "../Db/pregunta_db.php";


ini_set('display_startup_errors', 1);

error_reporting(E_ALL);

if(isset($_GET['titulo']) && $_GET['titulo']!='' && $_GET['contenido'] && $_GET['contenido']!='' && $_GET['empleado']){
    //Si recibo los datos titulo, contenido y empleado del get. Los guardo
    $titulo = $_GET['titulo'];
    $contenido = $_GET['contenido'];
    $empleado = $_GET['empleado'];
    $tags = $_GET['tag'];
    
    $fecha = date('y-m-d');  
   $result = insertPregunta($titulo,$contenido,$empleado,$fecha,$tags);
   
   echo "<script languaje='javascript' type='text/javascript'>window.close();</script>";
}
if(isset($_GET['accion'])){
    if($_GET['accion']=="editar"){
        echo "<script languaje='javascript' type='text/javascript' src='/js/nPregunta.js'></script>";
    }else{
        echo"<p>ADIOS</p>";
    }
}


require_once '../views/nPregunta.view.php';
?>