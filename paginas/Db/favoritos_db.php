<?php
function preguntaFavEmp($numEmp){
    $dbh = connect();
    $stmt = $dbh->prepare("SELECT pregunta_id FROM favorito WHERE empleado_numEmple = :numEmp");
    $stmt->execute(['numEmp' => $numEmp]);
    return $stmt->fetchAll();
}

function selectPreguntaId($id){
    $dbh = connect();
    $stmt = $dbh->prepare("SELECT titulo FROM pregunta WHERE id = :id");
    $stmt->execute(['id' => $id]);
    $stmt->setFetchMode(PDO::FETCH_OBJ);
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
?>