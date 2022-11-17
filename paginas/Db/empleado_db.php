<?php 
require_once "db.php";
function validateLogin($user, $pass) { // esta funcion le devolvera a una variable creada anteriormente llamada 
    // response el resultado de la validación

    try {
        // De la conexion preparamos un statement en el que pedimos a la BBDD
        // la posible aparicio de dicho nombre de usuario
        // LOWER nos permite obtener dicho posible usuario en minusculas, 
        // para que así tanto como haya sido escrito por el usuario en la base de 
        // datos como este lo haya escrito en el login sean iguales.
        //$find = $dbConnection->prepare("SELECT numEmple, LOWER(Nombre) FROM empleado WHERE nombre = ?");
        $dbConnection = connect();
        $find = $dbConnection->prepare("SELECT numEmple FROM empleado WHERE numEmple = ?");
        $find->execute([$user]);
        $data = $find->fetch(PDO::FETCH_ASSOC);
        if($data == false) {
            return "Usuario no encontrado.";
        }
        $userFind = $data['numEmple'];

        $find = $dbConnection->prepare("SELECT pass FROM empleado WHERE numEmple = ?");
        
        $find->execute([$user]);
        $data = $find->fetch(PDO::FETCH_ASSOC);
        /*if($data == false) {
            return "Contraseña incorrecta.";
        }*/
        $passFind = $data["pass"];
        
        //if($userFind == strtolower($user)){
        if($userFind == $user) {
            if(password_verify($pass, $passFind)) {
                return true;
            } else {
                return false;
            }
        } 
    } catch(PDOException $e) {
        echo $e->getMessage();
    }   
}

function registerUser($name, $surname, $email, $numEmp, $pass, $depar) {
        try{
            if(!is_numeric($numEmp)) {
                return "El numero de empleado solo puede contener numeros.";
            }
            $dbh = connect();
            $find = $dbh->prepare("SELECT numEmple FROM empleado");
            $find->execute();
            $data = $find->fetchAll(PDO::FETCH_ASSOC);
            foreach($data as $row) {
                if($row['numEmple'] == $numEmp) {
                    return "Ya existe el empleado.";
                }
            }
            $stmt = $dbh->prepare("INSERT into empleado (numEmple, nombre, apellidos, pass, correo, departamento) values (:numEmp, :name, :surname, :pass, :email, :depar)");
            $stmt->execute(['numEmp' => $numEmp, 'name' => $name, 'surname' => $surname, 'pass' => password_hash($pass, PASSWORD_DEFAULT), 'email' => $email, 'depar' => $depar]);
            return "Registrado correctamente.";
        }
        catch(PDOException $e){
            echo $e->getMessage();
        }   
}

function selectUsuarioById($numEmple){
       
    $dbh = connect();

    $stmt = $dbh->prepare("SELECT * FROM empleado WHERE numEmple = :numEmple");
    $stmt ->setFetchMode(PDO::FETCH_OBJ);
    $data = array(
        "numEmple" => $numEmple
    );
    $stmt->execute($data);
    return $stmt->fetchObject();
}

function selectNombreEmpleadoById($empleado){
    $dbh = connect();

    $stmt = $dbh->prepare("SELECT nombre,apellidos FROM empleado WHERE numEmple = :numEmple");
    $stmt ->setFetchMode(PDO::FETCH_OBJ);
    $data = array(
        "numEmple" => $empleado
    );
    $stmt->execute($data);
    return $stmt->fetchObject();
}


function updateUsuario($correo,$numEmple){
    $dbh = connect();
    $stmt = $dbh->prepare('UPDATE empleado SET correo = :correo WHERE numEmple = :numEmple');
    $data = array(
      "correo"=>$correo,
      "numEmple"=>$numEmple
    );
    return $stmt->execute($data); 
  }
    
  
  function consultarCorreo($correo){
   // $usuarios=[];
    $dbh = connect();
    $stmt = $dbh->prepare("SELECT numEmple FROM empleado WHERE correo = :correo");
    //si el numero de empleado coincide con el que está cargado, puedo hacer el update.
    //si el numero de empleado es distinto, el correo ya está asignado.
    $stmt->setFetchMode(PDO::FETCH_ASSOC);
    $data = array(
      "correo" => $correo
    );
    $stmt->execute($data);
    if($stmt->rowCount() >0){
    while($row = $stmt->fetch()){
      $usuarioDevuelto = $row['numEmple'];
      //array_push($usuarios, $usuarioDevuelto);
    }}
    if(isset($usuarioDevuelto)){
      return $usuarioDevuelto;
    }else{
      return 0;
    }
    
  }
