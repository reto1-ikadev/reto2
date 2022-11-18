<?php

    require "/var/www/html/Db/notification.php";
    session_start();

    header("Content-Type: application/json");
    $json = searchNotification($_SESSION['usuario']['numEmple']);
    $counted = count($json);

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

?>