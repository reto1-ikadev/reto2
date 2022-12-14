<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="/styles/style.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />
    <?php
    foreach ($css as $css) {
        echo "<link rel='stylesheet' href='$css'>";
    }
    ?>

</head>

<body>
    <header>
        <div class="logo">

        </div>
        <div class="bin">
            
        </div>
        <div class="notification">
            <span id="botonNotificaciones" class="material-symbols-outlined">
                notifications
            </span>
            <span class="contador">
                
            </span>
            <div class="box" id="box">
                <div class="heading"><p>Notificaciones</p></div>
                <button type="button" id="botonLimpiar">Limpiar</button>
                <div id="notificaciones">
                </div>
            </div>
        </div>
        <div class="despleglabe">
        <div class="dropdown">
            <button class="imagenPerfil"></button>
            <div class="dropdown-content">
                    <a href="/controladores/paginaPrincipal.php">Inicio</a>
                    <a href="/controladores/miPerfil.php?accion=cargar">Mi Perfil</a>
                    <a href="/controladores/verGuias.php">Gu&iacute;as</a>
                    <a href="/controladores/cerrarSesion.php">Cerrar Sesion</a>
            </div>
        </div>
        </div>
        <script src="/js/notifications.js"></script>
    </header>