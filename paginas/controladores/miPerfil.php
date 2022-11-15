<?php
//Para hacer pruebas en el navegador hay que pasarle ?accion=cargar
    include_once "../Db/db.php";
    
    if(isset($_GET["accion"]) && $_GET["accion"] != ''){
        echo "recibo accion";
        //Necesito el num de empleado con el que ha iniciado sesion. Como no tengo la parte del código, voy a establecer una variable
        $nume = 12345; //despues lo cogere de $_SESSION
        if(isset($nume)){
            //Tengo que solicitar a la base de datos los datos del usuario
            $datos = selectUsuarioById($nume); 
            //El objeto datos, lo utilizo en miPerfil.view.php para asignar el valor al input
            // print_r($datos);
        }
    }
    
    function selectUsuarioById($nume){
       
        $dbh = connect();

        $stmt = $dbh->prepare("SELECT * FROM empleado WHERE numEmple = :nume");
        $stmt ->setFetchMode(PDO::FETCH_OBJ);
        $data = array(
            "nume" => $nume
        );
        $stmt->execute($data);
        return $stmt->fetchObject();
    }


    require_once "../views/miPerfil.view.php";
?>

