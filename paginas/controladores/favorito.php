<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

require_once "db.php";
header('Content-Type: application/json');

$preguntas = select();

echo $preguntas;

function add($datos){
    $numEmple = $_POST['num'];
    $idPregunta = $_POST['idP'];

    if($numEMple === '' || $idPregunta === ''){
        echo json_encode(['error' => 'Todos los campos son obligatorios']);
    }else{
        try{
            $dbh = connect();

            $sql = $dbh->prepare("INSERT INTO favorito (:numEmple, :idPregunta)");
            $datos = ['numEmple' => $numEmple, 'idPregunta' => $idPregunta];
            $sql->execute($datos);
            echo json_encode(['success' => 'Datos guardados correctamente']);
        }catch(Exception $err){
            echo $err->getMessage();
        }
    }
}

function select(){

    try{
        $dbh = connect();

        $sql = $dbh->prepare("SELECT pregunta_id from favorito where empleado_numEmple = :numEmple");
        $datos = ['numEmple' => 1]; 
       if($sql->execute($datos)){
        $result = $sql->fetchAll(PDO::FETCH_ASSOC);
        foreach($result as $row){
            $final = "<div>";
            $idP = $row['pregunta_id'];
            $sql = $dbh->prepare("SELECT titulo from pregunta where id = :id");
            $datos = ['id' => $idP];
            $sql->execute($datos);
            $resultado = $sql->fetch(PDO::FETCH_ASSOC);
            $final .= $resultado['titulo'] . "</div>";
            echo $final;
        }
    }    
    }catch(Exception $err){
        echo $err->getMessage();
    }
}
?>