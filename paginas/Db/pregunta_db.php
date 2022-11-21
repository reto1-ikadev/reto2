<?php
require_once "db.php";
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

function selectPreguntaPorIdPregunta($id){
    try{
        $dbh = connect();
        $stmt = $dbh->prepare("SELECT * FROM pregunta WHERE id=:id ");
        $stmt ->setFetchMode(PDO::FETCH_OBJ);
        $data = array(
            "id" => $id
        );
        $stmt->execute($data);
        while($row = $stmt->fetch()){
        
            $tags = $row->tags;
            $contenido = $row->contenido;
            $fecha = $row->fecha;

            $p = array(
                "contenido" => $contenido,
                "fecha" => $fecha,
                "tags" => $tags
            );
    
            if(!isset($misPreguntas[$id])){
                $misPreguntas[$id] = [];
            }
            $misPreguntas[$id] = $p;
        }
        return $misPreguntas;

    }catch(Exception $e){
        echo 'Exception -> ';
        var_dump($e->getMessage());
    }
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
function selectPreguntaId($id){
    $dbh = connect();
    $stmt = $dbh->prepare("SELECT titulo FROM pregunta WHERE id = :id");
    $stmt->execute(['id' => $id]);
    $stmt->setFetchMode(PDO::FETCH_OBJ);
    return $stmt->fetchAll();
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
   

    while($row = $stmt->fetch()){
        
        $id = $row->id;
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

function selectPregunta(){
    $dbh = connect();
    $stmt = $dbh->prepare("SELECT * FROM pregunta");
    $stmt->setFetchMode(PDO::FETCH_OBJ);
    $stmt->execute();
    return $stmt->fetchAll();
}


function deletePregunta(){
    $dbh = connect();
    $stmt = $dbh->prepare("DELETE FROM pregunta WHERE id =:id");
    $stmt->setFetchMode(PDO::FETCH_OBJ);
    $stmt->execute(["id"=>$id]);
}
