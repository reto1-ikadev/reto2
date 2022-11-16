<?php
require_once "db.php";


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