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
//function count preguntas
function countPreguntas(){
    $dbh = connect();
    $stmt = $dbh->prepare("SELECT COUNT(*) FROM pregunta");
    $stmt->execute();
    $stmt->setFetchMode(PDO::FETCH_OBJ);
    return $stmt->fetchAll()[0]->{'COUNT(*)'};
}
function selectPreguntas($page){
    $dbh = connect();
    $offset = 8 * ($page - 1);
    $stmt = $dbh->prepare("SELECT * FROM pregunta ORDER BY id DESC LIMIT 8 OFFSET :offset");
    $stmt ->bindValue(':offset', $offset, PDO::PARAM_INT);
    $stmt->setFetchMode(PDO::FETCH_OBJ);
    $stmt->execute();
    return $stmt->fetchAll();
}


function selectPreguntasFiltradas($titulo, $page, $fechaInicio ="", $fechaFin ="", $tags =""){
    $dbh = connect();
    $offset = 8 * ($page - 1);
    $fechaInicio = $fechaInicio == "" ? "1999-01-01" : $fechaInicio;
    $fechaFin = $fechaFin == "" ? "2050-01-01" : $fechaFin;
    $stmt = $dbh->prepare("SELECT * FROM pregunta WHERE titulo LIKE CONCAT('%', :titulo, '%') AND tags  LIKE CONCAT('%', :tags, '%') AND fecha  BETWEEN :fechaInicio AND :fechaFin  ORDER BY id DESC LIMIT 8 OFFSET :offset");
    $stmt ->bindValue(':titulo', $titulo, PDO::PARAM_STR);
    $stmt ->bindValue(':tags', $tags, PDO::PARAM_STR);
    $stmt ->bindValue(':fechaInicio', $fechaInicio, PDO::PARAM_STR);
    $stmt ->bindValue(':fechaFin', $fechaFin, PDO::PARAM_STR);
    $stmt ->bindValue(':offset', $offset, PDO::PARAM_INT);
    $stmt->setFetchMode(PDO::FETCH_OBJ);
    $stmt->execute();
    return $stmt->fetchAll();
}
