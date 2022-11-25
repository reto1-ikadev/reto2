<?php
    require "/var/www/html/show_all_errors.php";
    require "db.php";

    function searchNotification($usuario) {
        $arr = array();
        $db = connect();

        //$stmt = $db->prepare("SELECT titulo FROM notificacion WHERE empleado_numEmple = ?");
        $stmt = $db->prepare("SELECT titulo FROM notificacion WHERE empleado_numEmple = ?");
        $stmt->execute([$usuario]);
        $allNotifications = $stmt->fetchAll(PDO::FETCH_ASSOC);

        
        return $allNotifications;
    }

    function deleteNotification($usuario) {
        $db = connect();
        $stmt = $db->prepare("DELETE FROM notificacion WHERE empleado_numEmple = ?");
        $stmt->execute([$usuario]);
    }

    //var_dump(searchNotification(1));