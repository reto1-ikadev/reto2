<?php

    require "/var/www/html/Db/notification.php";
    session_start();

    deleteNotification($_SESSION['usuario']['numEmple']);