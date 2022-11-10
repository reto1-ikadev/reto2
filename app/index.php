<?php 
ini_set('display_errors', 1);
include 'Db/db.php';

$host="db-1";
$user="ikasdev";
$pass="AIac7925";
$db="db_aergibide";

$dbh = connect($host,$db,$user,$pass);

//funcion nombre_Empleado
function nombre_Empleado($dbh){
    $sql = "SELECT * FROM empleados";
    $stmt = $dbh->prepare($sql);
    $stmt->execute();
    $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
    foreach($result as $row){
       $nombre= $row['nombre_Empleado'];
    }
    echo "Bienvenido " .$nombre;
}


include 'views/pprincipal.php';