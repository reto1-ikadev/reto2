<?php 
// Para indicar los posibles errores habilitmaos la presencia
// de ser imprimidos en pantalla
ini_set('display_errors', 1);

//Libreria que contiene las funciones para conectarse a la base de datos.
include 'Db/db.php';

// Conexion con la base de datos
$dbh = connect($host,$db,$user,$pass);

//include 'views/pprincipal.php';