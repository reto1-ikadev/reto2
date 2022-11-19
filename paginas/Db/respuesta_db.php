<?php
require_once "db.php";
require_once "empleado_db.php";

function insertRespuesta($contenido, $idPregunta,$usuario){
    try{
        $dbh = connect();
        $stmt = $dbh->prepare("INSERT INTO respuesta(contenido,empleado_numEmple, pregunta_id) VALUES(:contenido, :empleado_numEmple, :pregunta_id)");
        $data = array(
            'contenido' => $contenido,
            "empleado_numEmple" => $usuario,
            "pregunta_id" => $idPregunta
        );
       return $stmt->execute($data);


    }catch(Exception $e){
        echo 'Exception -> ';
        var_dump($e->getMessage());   
    }
}

function selectRespuestaPorIdPregunta($id){
    $respuestas = [];
    $dbh = connect();
    $id= intval($id);

    $stmt = $dbh->prepare("SELECT * FROM respuesta WHERE pregunta_id = :pregunta_id");
    $stmt ->setFetchMode(PDO::FETCH_OBJ);
    $data = array(
        "pregunta_id"=>$id
    );
    $stmt->execute($data);
   
    while($row = $stmt->fetch()){
        
        $idPregunta = $row->id;
        
        $contenido = $row->contenido;
        $empleado = $row->empleado_numEmple;
        $resultadoNombre = selectNombreEmpleadoById($empleado);
        $nombre = $resultadoNombre->nombre;
        $apellido = $resultadoNombre->apellidos;
        $r = array(
            "contenido" => $contenido,
            "empleado" => $empleado,
            "nombreEmpleado" => $nombre,
            "apellido" => $apellido
        );
        if(!isset($respuestas[$id])){
            $respuestas[$idPregunta]=[];
        }
        $respuestas[$idPregunta] = $r;
        
    }
    return $respuestas;
    
}

function selectRespuesta($id){
    $dbh = connect();
    $stmt = $dbh->prepare("SELECT * FROM respuesta WHERE pregunta_id = :id ORDER BY id DESC LIMIT 1");
    $stmt->setFetchMode(PDO::FETCH_OBJ);
    $stmt->execute(['id' => $id]);
    return $stmt->fetchAll();
}
?> 