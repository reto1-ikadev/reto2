<?php 

include_once "../Db/pregunta_db.php";

if(isset($_GET['titulo']) && $_GET['titulo']!='' && $_GET['contenido'] && $_GET['contenido']!=''){
    //Si recibo los datos titulo, contenido y empleado del get. Los guardo
    $id = $_GET['idPregunta'];
    $titulo = $_GET['titulo'];
    $contenido = $_GET['contenido'];
    $tags = $_GET['tag'];

    $fecha = date('y-m-d');  
    $result = updatePregunta($id,$titulo,$contenido,$fecha,$tags);

    echo "<script languaje='javascript' type='text/javascript'>window.close();</script>";
   
}





require_once '../views/updatePregunta.view.php';
