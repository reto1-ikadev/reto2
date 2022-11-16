<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="/styles/style.css">
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
            <img src="/img/aernnova.png" class="imglogo">
        </div>
        <div class="bin">
            <b><?php //nombre_Empleado($dbh); 
                ?></b>
        </div>
        <a href="/index.php?notifications=show" class="notification">
        <span class="material-symbols-outlined">
            notifications
        </span>
            <span class="badge">3</span>
        </a>
        <div class="despleglabe">
        <div class="dropdown">
            <button class="imagenPerfil"></button>
            <div class="dropdown-content">
                    <a href="/controladores/pprincipal.php">Inicio</a>
                    <a href="/controladores/miPerfil.php?accion=cargar">Mi Perfil</a>
                    <a href="">Mis Preguntas</a>
                    <a href="">Favoritas</a>
                    <a href="">Cerrar Sesion</a>
            </div>
        </div>
        </div>
    </header>