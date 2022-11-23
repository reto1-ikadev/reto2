<?php
include_once "../Db/guias_db.php";

if(isset($_POST['titulo']) && $_FILES['archivos']['size'] > 0){
        $target_file = "../archivosGuardados/" . basename($_FILES["archivos"]["name"]);
        if (move_uploaded_file($_FILES["archivos"]["tmp_name"], $target_file)){
            $contenido = $_POST['titulo'];
            $archivo_ruta = $target_file;
            $archivo_nombre = $_FILES["archivos"]["name"];
            $archivo_tipo = $_FILES["archivos"]["type"];    
            $idArchivo = insertArchivo($archivo_ruta, $archivo_nombre, $archivo_tipo);
            insertGuia($contenido, $idArchivo);
            echo json_encode(['success' => "El archivo se ha subido correctamente"]);
    }
    }

       
?>