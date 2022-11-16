<?php
require_once "db.php";
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

?>