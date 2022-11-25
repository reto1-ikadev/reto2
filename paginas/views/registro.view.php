<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Registro</title>
        <style>
        @import url('https://fonts.googleapis.com/css2?family=Gruppo&family=Roboto:wght@100;300;400;500;700;900&display=swap');
        </style>
        <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />
        <link rel="stylesheet" href="../styles/registro.css">
    </head>
    <body>
        <div id="contenedor">
            <div id="titulo">
                   <h3> REGISTRO </h3> <span class="material-symbols-outlined"> how_to_reg </span>
            </div>
            <form id="formulario" method="POST" action="#">
                <div id="nombreDiv">
                    <label for="nombre">Nombre</label>
                    <input type="text" id="nombre" name="nombre">
                </div>
                <div id="apellidoDiv">
                    <label for="apellido">Apellido</label>
                    <input type="text" id="apellido"name="apellido">
                </div>
                <div id="correoDiv">
                    <label for="correo">Correo</label>
                    <input type="text" id="correo"name="correo">
                </div>
                <div id="numDiv">
                    <label for="num">Num. Empleado</label>
                    <input type="number" id="num" name="num">
                </div>
                <div id="passDiv">
                    <label for="pass">Contraseña</label>
                    <input type="password" id="pass" name="pass">
                </div>
                <div id="deptDiv">
                    <label for="depart">Departamento</label>
                    <select name="depar" id="dept">
                        <option name="1" value="1">1</option>
                        <option name="2" value="2">2</option>
                        <option name="3" value="3">3</option>
                        <option name="4" value="4">4</option>
                        <option name="5" value="5">5</option>
                    </select>
                </div>
                <div id="bot">
                    <input type="submit" id="aceptar" class="boton" name="aceptar" value="Aceptar">
                    <input type="button" id="borrar" class="boton" value="Borrar">
                    <?php

                        if($response != "nothing") {
                            echo $response;
                        }

                    ?>
                </div>
                
            </form>
                <div id="volv">
                    <form action="../controladores/login.php" method="POST">
                        <button class="boton" id="volver">Volver <span class="material-symbols-outlined"> keyboard_return </span> </button>
                    </form>
                </div>
        </div>
    </body>
    <!--<script src="../js/registro.js"></script>-->
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="../js/cambioPreferencias.js"></script>
</html>