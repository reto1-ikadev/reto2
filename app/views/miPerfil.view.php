<?php
$css = [
    '/styles/miPerfil.css'
];

?>
<?php require_once 'parcial/header.php'; ?>
<!-- AQUI SE IMPORTA EL ENCABEZADO -->
<div class="contenedor">
<div id="main">
    <h4>Mis datos:</h4>
    <div class="division">
        <form id="formulario">

            <div class="lineaF">
                <label for="nombre">Nombre</label>
                <input type="text" name="nombre" value="Celia">
            </div>

            <div class="lineaF">
                <label for="apellido">Apellido</label>
                <input type="text" name="apellido" value="Garcia">
            </div>

            <div class="lineaF">
                <label for="correo">eMail</label>
                <input type="text" name="correo" value="celia.gardol@gmail.com">
            </div>

            <div class="lineaF">
                <label for="pass">Contrase&ntilde;a</label>
                <input type="text" name="pass" value="123">
            </div>
            <div class="lineaF">
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
                <button class="boton" type="submit">Modificar</button>
            </div>
        </form>
    </div>

    <h4>Mis preguntas:</h4>
    <div class="division">
        <div class="pregunta">
            <h4>Aquí se genera el titulo de la pregunta </h4>
            <div><span class="material-symbols-outlined">delete</span><span class="material-symbols-outlined">edit</span></div>
        </div>
    </div>

    <h4>Mis favoritos:</h4>
    <div class="division">
        <div class="favorito">
            <h4>Aquí se genera el titulo de la pregunta favorita</h4>
            <div><span class="material-symbols-outlined">star_rate</span></div>
        </div>
        <div class="favorito">
            <h4>Aquí se genera el titulo de la pregunta favorita</h4>
            <div><span class="material-symbols-outlined">star_rate</span></div>
        </div>
        <div class="favorito">
            <h4>Aquí se genera el titulo de la pregunta favorita</h4>
            <div><span class="material-symbols-outlined">star_rate</span></div>
        </div>
        <div class="favorito">
            <h4>Aquí se genera el titulo de la pregunta favorita</h4>
            <div><span class="material-symbols-outlined">star_rate</span></div>
        </div>
    </div>
</div>

<div id="aside">
    <!-- FOTO DE PERFIL Y NOTIFICACIONES -->
    <div id="fotoPerfil">
        <!-- FOTO DE PERFIL -->
        <img src="/img/avatar.png" alt="avatar" class="avatar">
    </div>

    <!--NOTIFICACIONES -->
    <div class="division">
        <div class="notificaciones">
            <h4>Aquí se generan las notificaciones</h4>
        </div>

    </div>
</div>
</div>
<?php require_once 'parcial/footer.php'; ?>
</body>
<script src="/js/miPerfil.js"></script>

</html>