<?php
require_once "db.php";

function selectGuias() {
    try {
        $dbh = connect();
        $find = $dbh->prepare("SELECT * FROM guia");
        $find->execute();
        $data = $find->fetchAll(PDO::FETCH_OBJ);
        return $data;
    } catch(PDOException $e) {
        echo $e->getMessage();
    }
}


function selectArchivo($archivo) {
    $dbh = connect();
    $stmt = $dbh->prepare("SELECT * FROM archivos WHERE id = :id");
    $stmt->bindParam(':id', $archivo, PDO::PARAM_INT);
    $stmt->setFetchMode(PDO::FETCH_OBJ);
    $stmt->execute();
    
    return $stmt->fetchAll();
}

function insertArchivo($archivo_ruta, $archivo_nombre, $archivo_tipo){
    //insert into archivo (nombre, ruta) values ('nombre', 'ruta');
    try{
        $dbh = connect();
        $stmt = $dbh->prepare("INSERT INTO archivos (nombre, ruta, tipo) VALUES(:nombre, :ruta, :tipo)");
        $data = array(
            'nombre' => $archivo_nombre,
            'ruta' => $archivo_ruta,
            'tipo' => $archivo_tipo
        );
        $stmt->execute($data);
        $lastId = $dbh->lastInsertId();
        return $lastId;
    }catch(Exception $e){
        echo 'Exception -> ';
        var_dump($e->getMessage());   
    }
}

function insertGuia($contenido, $idArchivo){
    try{
        $dbh = connect();
        $stmt = $dbh->prepare("INSERT INTO guia (contenido, idArchivo) VALUES(:contenido, :idArchivo)");
        $data = array(
            'contenido' => $contenido,
            'idArchivo' => $idArchivo
        );
        $stmt->execute($data);
        $lastId = $dbh->lastInsertId();
        return $lastId;
    }catch(Exception $e){
        echo 'Exception -> ';
        var_dump($e->getMessage());   
    }
}


