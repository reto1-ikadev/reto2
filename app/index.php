<?php 
// Para indicar los posibles errores habilitmaos la presencia
// de ser imprimidos en pantalla
ini_set('display_errors', 1);

if(!isset($_SESSION['user'])) {
    header("Location: /login.php");
}

include 'views/pagprincipal.view.php';

?>