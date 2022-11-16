<?php 
ini_set('display_errors', 1);

if(isset($_GET['registrar'])) {
    require_once "controladores/registro.php";
    die();
}

require_once 'controladores/login.php';

?>