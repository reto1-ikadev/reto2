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
//show last id inserted
        $stmtNot = $dbh->prepare("INSERT INTO notificacion (empleado_numEmple, titulo) VALUES((SELECT empleado_numEmple FROM pregunta WHERE ID = :preguntaID), (SELECT titulo FROM pregunta WHERE ID = :preguntaaID))");
        $stmtNot->execute(
            array(
                'preguntaID' => $idPregunta,
                'preguntaaID' => $idPregunta
            ));        
        $stmt->execute($data);
        $lastId = $dbh->lastInsertId();
        return $lastId;


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
        $idRespuesta = $row->id;
        $contenido = $row->contenido;
        $empleado = $row->empleado_numEmple;
        $resultadoNombre = selectNombreEmpleadoById($empleado);
        $nombre = $resultadoNombre->nombre;
        $apellido = $resultadoNombre->apellidos;
        $r = array(
            "idRespuesta" => $idRespuesta,
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

function selectRespuestaIdRespuesta($id){
    $dbh = connect();
    $stmt = $dbh->prepare("SELECT * FROM respuesta WHERE id = :id ORDER BY id DESC LIMIT 1");
    $stmt->setFetchMode(PDO::FETCH_OBJ);
    $stmt->execute(['id' => $id]);
    
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

function insertArchivoRespuestas($idRespuesta, $idArchivo){
    try{
        $dbh = connect();
        $stmt = $dbh->prepare("INSERT INTO archivo_respuesta (id_respuesta, id_archivo) VALUES(:id_respuesta, :id_archivo)");
        $data = array(
            'id_respuesta' => $idRespuesta,
            'id_archivo' => $idArchivo
        );
        $stmt->execute($data);
        $lastId = $dbh->lastInsertId();
        return $lastId;
    }catch(Exception $e){
        echo 'Exception -> ';
        var_dump($e->getMessage());   
    }
}
function respuestaContieneArchivo($id){
    $dbh = connect();
    $stmt = $dbh->prepare("SELECT * FROM archivo_respuesta WHERE id_respuesta = :id");
    $stmt->setFetchMode(PDO::FETCH_OBJ);
    $stmt->execute(['id' => $id]);
    $resultado = $stmt->fetchAll();
    if(count($resultado) > 0){
        return true;
    }else{
        return false;
    }
}

function buscaridArchivo($id){
    $dbh = connect();
    $stmt = $dbh->prepare("SELECT id_archivo FROM archivo_respuesta WHERE id_respuesta = :id");
    $stmt->setFetchMode(PDO::FETCH_OBJ);
    $stmt->execute(['id' => $id]);
    $resultado = $stmt->fetch();

    return $resultado->id_archivo;
}

function recojerArchivo($idArchivo){
    $dbh = connect();
    $stmt = $dbh->prepare("SELECT * FROM archivos WHERE id = :id");
    $stmt->setFetchMode(PDO::FETCH_OBJ);
    $stmt->execute(['id' => $idArchivo]);
    
    return $stmt->fetchAll();
}

?> 