<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mi Perfil</title>
    <style>
    @import url('https://fonts.googleapis.com/css2?family=Gruppo&family=Roboto:wght@100;300;400;500;700;900&display=swap');
    </style>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />
    <link rel="stylesheet" href="miPerfil.css">
</head>
<body>
    <!-- AQUI SE IMPORTA EL ENCABEZADO -->
    <div id="contenedor">
        <div id = "main">
            <div id="misDatos">
                <label for="nombre">Nombre</label>
                <input type="text" id="nombre" name="nombre">
                <label for="apellido">Apellido</label>
                <input type="text" id="apellido" name="apellido">
                <label for="correo">eMail</label>
                <input type="text" id="correo" name="correo">
                <label for="num">Numero de empleado</label>
                <input type="text" id="num" name="num">
                <label for="pass">Contrase&ntilde;a</label>
                <input type="text" id="pass" name="pass">
                <label for="dept">Departamento</label>
                <input type="text" id="dept" name="dept">
                <button>Aceptar</button> <button>Borrar</button>
                <a href="login.view.php">Volver</a>
            </div>
            <div id="misPreguntas"></div>
            <div id="misFavoritos"></div>
        </div>

        <div id = "aside">
            <!-- FOTO DE PERFIL Y NOTIFICACIONES -->
            <div id="fotoPerfil">
                <!-- FOTO DE PERFIL -->
            </div>

            <div id="notificaciones">
                <!--NOTIFICACIONES -->
            </div>
        </div>
    </div>


    
    <!-- AQUI SE IMPORTA EL PIE DE PAGINA -->
</body>
</html>