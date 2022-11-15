<?php
    ini_set('display_errors', 1);
    ini_set('display_startup_errors', 1);
    error_reporting(E_ALL);
    
    require "../Db/db.php";

    $response = "nothing";

    if(isset($_POST['nombre'], $_POST['apellido'], $_POST['correo'], $_POST['num'], $_POST['pass'], $_POST['dept'])) {
         addEmpleado();

    function addEmpleado(){

        header('Content-Type: application/json');

        $nombre = $_POST['nombre'];
        $apellido = $_POST['apellido'];
        $correo = $_POST['correo'];
        $pass = $_POST['pass'];
        $departamento =$_POST['dept'];
        $num =$_POST['num'];

       if(buscarEmpleado($num)) {

        try {
            $dbh = connect();
        
            $sql = $dbh->prepare("INSERT INTO empleado (numEmple, nombre, apellidos, pass, correo, departamento) values (:numEmple, :nombre, :apellidos, :pass, :correo, :departamento)");
            $datos = ['numEmple' => $num,'nombre' => $nombre, 'apellidos' => $apellido, 'correo' => $correo, 'pass' => $pass, 'departamento' => $departamento];
            $sql->execute($datos);
            echo json_encode(['success' => 'Datos guardados correctamente']);
        } catch(Exception $err) {
            echo $err->getMessage();
        }
    
        }
        else{
            echo json_encode(['error' => 'El numero de empleado ya existe']);
        }
        }
    
        function buscarEmpleado($num){

            $find = $dbh->prepare("SELECT numEmple FROM empleado");
            $find->execute();
            $data = $find->fetchAll(PDO::FETCH_ASSOC);
            foreach($data as $row) {
                if($row['numEmple'] == $num) {
                    return false;
                }
            }
            return true;
        }

    require "../views/registro.view.php";

?>