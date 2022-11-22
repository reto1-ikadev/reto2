<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Login</title>
        <style>
        @import url('https://fonts.googleapis.com/css2?family=Gruppo&family=Roboto:wght@100;300;400;500;700;900&display=swap');
        </style>
        <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />
        <link rel="stylesheet" href="../styles/login.css">
    </head>
    <body>
        <div id="contenedor">
            <div id="titulo">
                   <h3> INICIO SESION </h3> <span class="material-symbols-outlined"> login </span> 
            </div>
            <form action=" " method="post">
                <div id="usuarioDiv">
                    <label for="usuario">Usuario</label>
                    <input type="text" id="usuario"name="usuario">
                </div>
                <div id="passDiv">
                    <label for="pass">Contraseña</label>
                    <input type="password" id="pass"name="pass">
                </div>
                <div id="bot">
                    <input type="submit" name="aceptar" id="aceptar" class="boton" value="aceptar">
                    <input type="button" id="borrar" class="boton" value="borrar">
                </div>
                
            </form>
                <div id="cont">
                    <a href="../controladores/contrasena.php" id="cont">He olvidado la CONTRASEÑA</a>
                    <form action="../controladores/registro.php">
                        <button class="boton" id="registro">REGISTRARME <span class="material-symbols-outlined"> how_to_reg </span> </button>
                    </form>
                </div>
        </div>
    </body>
    <script src="/js/login.js"></script>
</html>