<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Contraseña olvidada</title>
        <style>
        @import url('https://fonts.googleapis.com/css2?family=Gruppo&family=Roboto:wght@100;300;400;500;700;900&display=swap');
        </style>
        <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />
        <link rel="stylesheet" href="../styles/pass.css">
    </head>
    <body>

        <div id="contenedor">

            <div id="titulo">
                <h3> CONTRASEÑA OLVIDADA </h3> <span class="material-symbols-outlined">password</span>
            </div>

            <form action="contrasena.php" method="post">

                <div id="nPass">
                    <label for="pass">Nueva contraseña</label>
                    <input type="password" id="pass" name="pass">
                </div>

                <div id="nPass">
                    <label for="pass2">Escribe de nuevo</label>
                    <input type="password" id="pass2" name="pass2">
                </div>

                <div id="bot">
                    <input type="submit" id="aceptar" class="boton" value="Aceptar">
                    <input type="submit" id="aceptar" class="boton" value="Borrar">
                </div>

            </form>

            <a id="volver" href="../controladores/login.php">Volver <span class="material-symbols-outlined"> keyboard_return </span> </a> 
            


        </div>

    </body>
    <script src="pass.js"></script>
</html>