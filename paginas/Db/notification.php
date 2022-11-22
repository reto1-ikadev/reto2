<?php
    require "/var/www/html/show_all_errors.php";
    require "db.php";

    function searchNotification($usuario) {
        $arr = array();
        $db = connect();

        //$stmt = $db->prepare("SELECT titulo FROM notificacion WHERE empleado_numEmple = ?");
        $stmt = $db->prepare("SELECT titulo FROM pregunta WHERE id = ?");
        $stmt->execute([$usuario]);
        $allNotifications = $stmt->fetchAll(PDO::FETCH_ASSOC);

        
        return $allNotifications;
    }

    //var_dump(searchNotification(1));