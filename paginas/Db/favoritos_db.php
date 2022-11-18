<?php
require_once "db.php";
function preguntaFavEmp($numEmp){
    $dbh = connect();
    $stmt = $dbh->prepare("SELECT pregunta_id FROM favorito WHERE empleado_numEmple = :numEmp");
    $stmt->execute(['numEmp' => $numEmp]);
    return $stmt->fetchAll();
}


function deleteFav($id,$numEmple){
    $dbh = connect();
    $stmt = $dbh->prepare("DELETE FROM favorito WHERE pregunta_id = :id  AND empleado_numEmple = :numEmp");
    $stmt->setFetchMode(PDO::FETCH_OBJ);
    $stmt->execute(['id' => $id, 'numEmp' => $numEmple]);


}


function todasFav(){
    $dbh = connect();
    $stmt = $dbh->prepare("SELECT pregunta_id,COUNT(pregunta_id) FROM `favorito` GROUP BY pregunta_id ORDER BY COUNT(pregunta_id) DESC");
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

function insertFav($id,$numEmple){
    $dbh = connect();
    $stmt = $dbh->prepare("INSERT INTO favorito (pregunta_id, empleado_numEmple) VALUES (:id, :numEmp)");
    $stmt->setFetchMode(PDO::FETCH_OBJ);
    $stmt->execute(['id' => $id, 'numEmp' => $numEmple]);
}



?>