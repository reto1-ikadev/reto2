<?php
include_once "../Db/pregunta_db.php";

if(isset($_POST['titulo']) && $_FILES['archivos']['size'] > 0){
        //Si recibo los datos titulo, contenido y empleado del get. Los guardo
        //$titulo = $_GET['titulo'];
        //echo "<p>Titulo2: $archivo </p>";
        //echo "<p>Titulo: $titulo</p>";
        //echo "<script languaje='javascript' type='text/javascript'>window.close();</script>";
        //echo json_encode(['success' => "El archivo se ha subido correctamente"]);

        echo json_encode(['success' => "El archivo se ha subido correctamente"]);
    }

       
?>