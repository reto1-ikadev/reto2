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
    <header></header>  
        <div id = "main">
            <h4>Mis datos:</h4>
            <div class = "division">
                
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
                
                <!--
                <div class = "lineaF">
                    <label for="num">Nº empleado</label>
                    <input type="text" id="num" name="num">
                </div> -->

                <div class = "lineaF">
                    <label for="pass">Contrase&ntilde;a</label>
                    <input type="text" id="pass" name="pass">
                </div>

                <div class = "lineaF">
                    <label for="dept">Departamento</label>
                    <select name="dept" id="dept">
                        <option value="uno">Uno</option>
                        <option value="dos">Dos</option>
                        <option value="tres">Tres</option>
                        <option value="cuatro">Cuatro</option>
                        <option value="cinco">Cinco</option>
                    </select>
                </div>

                <div id="botones"> 
                <button class = "boton">Actualizar</button>
                </div>
                
            </div>
            <h4>Mis preguntas:</h4>
            <div class = "division">
                <div class = "pregunta">
                    <h4>Aquí se genera el titulo de la pregunta </h4>
                    <div><span class="material-symbols-outlined">delete</span><span class="material-symbols-outlined">edit</span></div>
                </div>
            </div>

            <h4>Mis favoritos:</h4>
            <div class = "division">
                <div class = "favorito">
                        <h4>Aquí se genera el titulo de la pregunta favorita</h4>
                        <div><span class="material-symbols-outlined">star_rate</span></div>
                </div>
            </div>
        </div>

        <div id = "aside">
            <!-- FOTO DE PERFIL Y NOTIFICACIONES -->
            <div id="fotoPerfil">
                <!-- FOTO DE PERFIL -->
                <img src="avatar.png" alt="avatar">
            </div>

                <!--NOTIFICACIONES -->
            <div class = "division">
                <div class = "notificaciones">
                    <h4>Aquí se generan las notificaciones</h4>
                </div>
                
            </div>
            
        </div>

        <footer></footer>
    </div>
</body>
<script src="miPerfil.js"></script>
</html>