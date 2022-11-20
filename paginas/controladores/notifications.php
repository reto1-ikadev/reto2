<?php
    //Este archivo permite devolver la peticion en un formato JSON aceptable.

    // Necesitamos el archivo notification.php para hacer la peticion.
    require "/var/www/html/Db/notification.php";
    session_start();

    header("Content-Type: application/json"); // Para indicar que devolveremos un JSON.
    $json = searchNotification($_SESSION['usuario']['numEmple']); // Necesitamos saber el 
    //numEmple que a iniciado sesion para recuperar sus notificaciones unicamente. (NO queremos la de los demas) 
    $counted = count($json);

    // Este codigo de abajo imprime por pantalla de una forma correcta como deberia ser un JSON.
    if($counted == 1) {
        echo "[" . json_encode($json[0]) . "]";
    } else {
        echo "[";
        $i = 1;
        foreach($json as $arr) {
            if($i == $counted) {
                echo json_encode($arr);
            } else {
                echo json_encode($arr) . ',';
            }
            $i++;
        }
        echo "]";
    }    
    
    exit();
