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
    <div id = "contenedor">
        <div id = "main">
            <div class = "division">
                <div class="supDiv"><h4>Mis datos:</h4></div>
                
                <div class = "lineaF">
                    <label for="nombre">Nombre</label>
                    <input type="text" id="nombre" name="nombre">
                </div>
                <div class = "lineaF">
                    <label for="apellido">Apellido</label>
                    <input type="text" id="apellido" name="apellido">
                </div>
                <div class = "lineaF">
                    <label for="correo">eMail</label>
                    <input type="text" id="correo" name="correo">
                </div>
                <div class = "lineaF">
                    <label for="num">Numero de empleado</label>
                    <input type="text" id="num" name="num">
                </div>
                <div class = "lineaF">
                    <label for="pass">Contrase&ntilde;a</label>
                    <input type="text" id="pass" name="pass">
                </div>
                <div class = "lineaF">
                    <label for="dept">Departamento</label>
                    <input type="text" id="dept" name="dept">
                </div>
                <div id="botones"> 
                <button class = "boton">Aceptar</button> <button class = "boton">Borrar</button>
                
                </div>
                <a class="volver" href="login.view.php">Volver</a>
            </div>
            <div class = "division"></div>
            <div class = "division"></div>
        </div>

        <div id = "aside">
            <p>aside</p>
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