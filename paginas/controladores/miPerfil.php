<?php
    ini_set('display_errors', 1);
    ini_set('display_startup_errors', 1);
    error_reporting(E_ALL);
    session_start();
    include_once "../Db/db.php";
    
    if(isset($_GET['id'])){
        $id = $_GET['id'];
        $numEmple = $_GET['numEmple'];
            deleteFav($id,$numEmple); 
            require_once '../views/miPerfil.view.php';
    }

//Para hacer pruebas en el navegador hay que pasarle ?accion=cargar

function añadirDatosAsession($datos)
{
    foreach ($datos as $key => $value) {
        $_SESSION[$key] = $value;
    }
}

function selectUsuarioById($numEmple)
{

    $dbh = connect();

    $stmt = $dbh->prepare("SELECT * FROM empleado WHERE numEmple = :numEmple");
    $stmt->setFetchMode(PDO::FETCH_OBJ);
    $data = array(
        "numEmple" => $numEmple
    );
    $stmt->execute($data);
    return $stmt->fetchObject();
}

function obtenerNumEmple()
{
    if (isset($_SESSION['usuario'])) {
        $session = $_SESSION['usuario'];
        //print_r($numUsu);
        foreach ($session as $usuario => $value) {
            $numEmple = $value;
        }
    }
    return $numEmple;
}

   
function mostrarFavoritos($numEmple){
    $preguntas = preguntaFavEmp($numEmple);
    $respuesta ="";
    foreach($preguntas as $pregunta){
        $titulos = selectPreguntaId($pregunta['pregunta_id']);   
        foreach($titulos as $titulo){    
            $respuesta .= "<div id={$pregunta['pregunta_id']} class=favorito>";
            $respuesta .= "<p> <h4>{$titulo->titulo}</h4>";
            $respuesta .= "<div><span name=fav id={$pregunta['pregunta_id']} class=material-symbols-outlined>star_rate</span></div>";
            $respuesta .= "</p>";
            $respuesta .= "</div>";
            $respuesta .= "<br>";
        }
       
    }
    echo $respuesta;
}
 
require_once "../views/miPerfil.view.php";
