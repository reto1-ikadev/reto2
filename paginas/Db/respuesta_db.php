<?php 
require_once "db.php";

function selectRespuesta($id){
    $dbh = connect();
    $stmt = $dbh->prepare("SELECT * FROM respuesta WHERE pregunta_id = :id ORDER BY id DESC LIMIT 1");
    $stmt->setFetchMode(PDO::FETCH_OBJ);
    $stmt->execute(['id' => $id]);
    return $stmt->fetchAll();
}