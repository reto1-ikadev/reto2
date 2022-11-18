<?php
//Con estas líneas se muestran los errores de php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
session_start();//Para poder utilizar la sesion
include_once "../Db/empleado_db.php";
include_once "../Db/pregunta_db.php";
include_once "../Db/respuesta_db.php";
include_once "../Db/favoritos_db.php";



require_once "../views/preferencias.view.php";
?>