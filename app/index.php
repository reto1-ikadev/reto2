<?php 
/*ini_set('display_errors', 1);
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
*/

//function para saber en que pagina php estoy
function paginaActual(){
    $url = $_SERVER["REQUEST_URI"];
    return $url;
}
//Si la pagina php coincide con la que estoy return vacio, si no return pagina php
function paginaActual2(){
    $url = "http://".$_SERVER["HTTP_HOST"].$_SERVER["REQUEST_URI"];
    if($url == "http://localhost:8080/index.php"){
        return "";
    }else{
        return $url;
    }
}




include 'views/pprincipal.php';