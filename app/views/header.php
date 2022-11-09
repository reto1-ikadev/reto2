<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="Styles/style.css">
</head>

<body>
    <div class="header">
        <div class="logo">
            <img src="Img/aernnova.png" class="imglogo">
        </div>
        <div class="bin" >
        <p><?php nombre_Empleado($dbh); ?></p>
        </div>
        <div class="despl">
            <input type="image" src="Img/icon1.png" class="boton">
            <div class="menu">
                <a href="index.php">Inicio</a>
                <a href="">Mi Perfil</a>
                <a href="">Mis Preguntas</a>
                <a href="">Favoritas</a>
                <a href="">Cerrar Sesion</a>
            </div>
        </div>
    </div>
</body>