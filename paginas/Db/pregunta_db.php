<?php
require_once "db.php";

function selectPreguntaPorIdPregunta($id){
    try{
        $dbh = connect();
        $stmt = $dbh->prepare("SELECT * FROM pregunta WHERE id=:id ");
        $stmt->setFetchMode(PDO::FETCH_OBJ);
        $idInt = intval($id);
        $stmt->bindValue(':id', $idInt, PDO::PARAM_INT);
        $stmt->execute();
        return  $stmt->fetchAll();

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


function deletePregunta($id){
    $dbh = connect();
    $stmt = $dbh->prepare("DELETE FROM pregunta WHERE id =:id");
    $stmt->setFetchMode(PDO::FETCH_OBJ);
    $stmt->execute(["id"=>$id]);
    
}

function updatePregunta($id,$titulo,$contenido,$fecha,$tags){
    $dbh = connect();
    $stmt = $dbh->prepare("UPDATE pregunta SET titulo = :titulo, contenido = :contenido, tags = :tags  WHERE id = :id");
    $data = array(
        "id"=>$id,
        "titulo" => $titulo,
        "contenido" => $contenido,
        "tags" => $tags
    );
    $stmt->execute($data);


}