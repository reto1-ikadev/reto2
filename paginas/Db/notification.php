<?php
    require "/var/www/html/show_all_errors.php";
    require "db.php";

    function searchNotification($usuario) {
        $arr = array();
        $db = connect();

        $stmt = $db->prepare("SELECT empleado_numEmple FROM notificacion WHERE empleado_numEmple = ?");
        $stmt->execute([$usuario]);
        $allNotifications = $stmt->fetchAll(PDO::FETCH_ASSOC);

        
        return $allNotifications;
    }

    //var_dump(searchNotification(1));

?>