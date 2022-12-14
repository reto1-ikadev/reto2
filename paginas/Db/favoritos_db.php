<?php
require_once "db.php";
function preguntaFavEmp($numEmp){
    $dbh = connect();
    $stmt = $dbh->prepare("SELECT pregunta_id FROM favorito WHERE empleado_numEmple = :numEmp");
    $stmt->execute(['numEmp' => $numEmp]);
    
    return $stmt->fetchAll();
}


function deletePregFav($id,$numEmple){
    $dbh = connect();
    $stmt = $dbh->prepare("DELETE FROM favorito WHERE pregunta_id = :id  AND empleado_numEmple = :numEmp");
    $stmt->setFetchMode(PDO::FETCH_OBJ);
    $stmt->execute(['id' => $id, 'numEmp' => $numEmple]);
    
}


function todasFav(){
    $dbh = connect();
    $stmt = $dbh->prepare("SELECT pregunta_id,titulo,COUNT(pregunta_id) as cant FROM `favorito`, pregunta WHERE pregunta_id=id GROUP BY pregunta_id ORDER BY COUNT(pregunta_id) DESC LIMIT 5");
    $stmt->setFetchMode(PDO::FETCH_OBJ);
    $stmt->execute();
    
    return $stmt->fetchAll();
}


function preguntaFav($id,$numEmp){
    $dbh = connect();
    $stmt = $dbh->prepare("SELECT * FROM favorito WHERE pregunta_id = :id AND empleado_numEmple = :numEmp");
    $stmt->setFetchMode(PDO::FETCH_OBJ);
    $stmt->execute(['id' => $id, 'numEmp' => $numEmp]);
    
    if($stmt->rowCount() > 0){
        return true;}
    else{
        return false;
    }
}

function insertPregFav($id,$numEmple){
    $dbh = connect();
    $stmt = $dbh->prepare("INSERT INTO favorito (pregunta_id, empleado_numEmple) VALUES (:id, :numEmp)");
    $stmt->setFetchMode(PDO::FETCH_OBJ);
    $stmt->execute(['id' => $id, 'numEmp' => $numEmple]);
    
}


function deleteRespFav($id,$numEmple){
    $dbh = connect();
    $stmt = $dbh->prepare("DELETE FROM respuestas_fav WHERE id_respuesta = :id  AND empleado_numEmple = :numEmp");
    $stmt->setFetchMode(PDO::FETCH_OBJ);
    $stmt->execute(['id' => $id, 'numEmp' => $numEmple]);
    
}

function respuestaFav($id,$numEmp){
    $dbh = connect();
    $stmt = $dbh->prepare("SELECT * FROM respuestas_fav WHERE id_respuesta = :id AND empleado_numEmple = :numEmp");
    $stmt->setFetchMode(PDO::FETCH_OBJ);
    $stmt->execute(['id' => $id, 'numEmp' => $numEmp]);
    
    if($stmt->rowCount() > 0){
        return true;}
    else{
        return false;
    }
}

function insertRespFav($id,$numEmple){
    $dbh = connect();
    $stmt = $dbh->prepare("INSERT INTO respuestas_fav (id_respuesta, empleado_numEmple) VALUES (:id, :numEmp)");
    $stmt->setFetchMode(PDO::FETCH_OBJ);
    $stmt->execute(['id' => $id, 'numEmp' => $numEmple]);
    
}

function respuestasFavEmp($numEmp){
    $dbh = connect();
    $stmt = $dbh->prepare("SELECT id_respuesta FROM respuestas_fav WHERE empleado_numEmple = :numEmp");
    $stmt->execute(['numEmp' => $numEmp]);
    
    return $stmt->fetchAll();
}


?>