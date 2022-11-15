<?php
include_once "../Db/db.php";
ini_set('display_errors', 1);

ini_set('display_startup_errors', 1);

error_reporting(E_ALL);

if(isset($_GET['titulo']) && $_GET['titulo']!='' && $_GET['contenido'] && $_GET['contenido']!='' && $_GET['empleado']){
    //Si recibo los datos titulo, contenido y empleado del get. Los guardo
    $titulo = $_GET['titulo'];
    echo $titulo;
    $contenido = $_GET['contenido'];
    echo $contenido;
    $empleado = $_GET['empleado'];
    echo $empleado;
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
    echo $tags;
    $fecha = date('d-m-Y');
    echo $fecha;
ºººººººººººººººººººººººººº
   $result = insertPregunta($titulo,$contenido,$empleado,$fecha,$tags);
   echo $result;
    
}

function insertPregunta($titulo,$contenido,$empleado,$fecha,$tags){
    try{
        $dbh = connect();
        $stmt = $dbh->prepare("INSERT INTO pregunta (titulo,contenido,fecha,tags,empleado_numEmple) VALUES(:titulo,:contenido,:fecha,:tags,:empleado)");

        $data = array(
            "titulo" => $titulo,
            "contenido" => $contenido,
            "fecha" => $fecha,
            "tags" => $tags,
            "empleado" => $empleado
        );
        $stmt->execute($data);


    }catch(Exception $e){
        echo 'Exception -> ';
        var_dump($e->getMessage());
    }
}

require_once '../views/nPregunta.view.php';
?>