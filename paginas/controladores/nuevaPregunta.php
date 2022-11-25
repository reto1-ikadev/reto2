<?php
include_once "../Db/pregunta_db.php";

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



require_once '../views/nuevaPregunta.view.php';