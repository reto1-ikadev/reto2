<?php
// Funcion que devuevle la conexión de la base de datos.

function connect(){
    //Variables necesarias para poder acceder a la base de datos, cambiar cuando se cambie
    // algún dato del servidor.
    $host = "localhost";
    $user = "root";
    $pass = "";
    $dbname = "db_aergibide";


    try {
    # MySQL
        return new PDO("mysql:host=$host;dbname=$dbname", $user, $pass);
    }
    catch(PDOException $e) {
        echo $e->getMessage();
    }
}

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

function validateLogin($dbConnection, $user, $pass) { // esta funcion le devolvera a una variable creada anteriormente llamada 
    // response el resultado de la validación

    try {
        // De la conexion preparamos un statement en el que pedimos a la BBDD
        // la posible aparicio de dicho nombre de usuario
        // LOWER nos permite obtener dicho posible usuario en minusculas, 
        // para que así tanto como haya sido escrito por el usuario en la base de 
        // datos como este lo haya escrito en el login sean iguales.
        $find = $dbConnection->prepare("SELECT Num_Empl, LOWER(Nombre) FROM empleado WHERE Nombre = ?");
        $find->execute([strtolower($user)]);
        $data = $find->fetch(PDO::FETCH_ASSOC);
        if($data == false) {
            return "Usuario no encontrado.";
        }
        $userFind = $data['LOWER(Nombre)'];

        $find = $dbConnection->prepare("SELECT Contrasenia FROM empleado WHERE Empleado_Num_Empl = ?");
        $find->execute([$data['Num_Empl']]);
        $numEmpl = $data['Num_Empl'];
        $data = $find->fetch(PDO::FETCH_ASSOC);
        /*if($data == false) {
            return "Contraseña incorrecta.";
        }*/
        $passFind = $data["Contrasenia"];
        
        
        if($userFind == strtolower($user)) {
            if(password_verify($pass, $passFind)) {
                // -----------------------------------------------------------------
                // AQUI TENGO QUE PROGRAMAR LA OPCION DE GUARDAR COOKIES Y SESIONES.
                // -----------------------------------------------------------------
                session_start();
                $_SESSION['user'] = $numEmpl;
                return "Exito en el inicio de sesion";
            } else {
                return "Contraseña incorrecta.";
            }
        } 
        
    } catch(PDOException $e) {
        echo $e->getMessage();
    }   
}

function registerUser($dbh, $name, $surname, $email, $numEmp, $pass, $depar) {
        try{
            if(!is_numeric($numEmp)) {
                return "El numero de empleado solo puede contener numeros.";
            }
            $find = $dbh->prepare("SELECT Num_Empl FROM empleado");
            $find->execute();
            $data = $find->fetchAll(PDO::FETCH_ASSOC);
            foreach($data as $row) {
                if($row['Num_Empl'] == $numEmp) {
                    return "Ya existe el empleado.";
                }
            }
            $stmt = $dbh->prepare("INSERT into empleado (Num_Empl, Nombre, Apellidos, Contrasenia, Correo, Departamento) values (:numEmp, :name, :surname, :pass, :email, :depar)");
            $stmt->execute(['numEmp' => $numEmp, 'name' => $name, 'surname' => $surname, 'pass' => password_hash($pass, PASSWORD_DEFAULT), 'email' => $email, 'depar' => $depar]);
            return "Registrado correctamente.";
        }
        catch(PDOException $e){
            echo $e->getMessage();
        }   
}

function closeConnection(&$dbConnection) { // Cerramos conexion
    $dbConnection = null;
}

?>
