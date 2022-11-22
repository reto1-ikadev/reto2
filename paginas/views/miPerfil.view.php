<?php
$css = [
    '/styles/miPerfil.css'
];

?>
<?php require_once 'parcial/header.php';
?>
<!-- AQUI SE IMPORTA EL ENCABEZADO -->

<div id="contenedor">

    <div id="main">
        <h2>Mis datos:</h2>
        <div class="division">
            <form id="formulario">
                <!-- Al cargar la pagina se envia el $get accion cargar. Se piden los datos a la bd y se cargan en el value del input -->
                <div class="lineaF">
                    <label for="nombre">Nº empleado</label>
                    <input class='deshabilitado' type="text" name="numEmple" value="<?= $_SESSION['numEmple'] ?>" readonly>
                </div>
                <div class="lineaF">
                    <label for="nombre">Nombre</label>
                    <input class='deshabilitado' type="text" name="nombre" value="<?= $_SESSION['nombre'] ?>" readonly>
                </div>

                <div class="lineaF">
                    <label for="apellido">Apellido</label>
                    <input class='deshabilitado' type="text" name="apellido" value="<?= $_SESSION['apellidos'] ?>" readonly>
                </div>

                <div class="lineaF">
                    <label for="correo">Email</label>
                    <input type="text" name="correo" value="<?= $_SESSION['correo'] ?>">
                </div>

                <div class="lineaF">
                    <label for="dept">Departamento</label>
                    <input class='deshabilitado' type="text" name="dept" value="<?= $_SESSION['departamento'] ?>" readonly>
                </div>

                <div id="botones">
                    <input type="hidden" name="accion" value="modificar">
                    <button class="boton" type="submit">Modificar</button>
                </div>

            </form>
        </div>

        <h2>Mis preguntas:</h2>
        <div class="division">
            <?php
            if (isset($misPreguntas)) {
                foreach ($misPreguntas as $pregunta => $value) { ?>
                    <div class="iconos">
                    <div class="pregunta" onclick="window.location='miPerfil.php?accion=cargar&accion2=abrirPregunta&id=<?= $pregunta ?>'">
                        <h4><?= $value['titulo']; ?></h4>
                        </div>
                        <div><span class="material-symbols-outlined"  onclick="window.location='miPerfil.php?accion=cargar&idB=<?= $pregunta ?>'">delete</span>
                    <span id=<?= $pregunta ?> name='edit'  class="material-symbols-outlined">edit</span></div></div>
                    <?php
            if (isset($id) && $id == $pregunta) {
                foreach ($misPreguntas as $pregunta => $value) { 
                    if($id == $pregunta){
                        ?>
                    <div class ='respuesta'>
                        <div class='contenido'>
                            
                            <?= $value['contenido'] ?>
                            
                        </div>
                        <div class = 'botonesRespuesta'>
                            <a class="boton" href="respuestas.php?titulo=<?= $value['titulo'] ?>&id=<?= $pregunta ?>">Ver respuestas</a>
                            <a class="boton" href="miPerfil.php?accion=cargar">Cerrar</a>
                            
                        </div>
                    </div>
                    <?php    
                    }
                    ?>
            <?php
                }
            } ?>
            <?php
                }
            }
            ?>
        </div>

        <h2>Mis favoritos:</h2>
        <div class="division">
        <?= mostrarFavoritos($_SESSION["numEmple"]) ?>
        </div>
        <div>
            
    </div>
        
    </div>

    <div id="aside">
        <!-- FOTO DE PERFIL Y NOTIFICACIONES -->
        <div id="fotoPerfil">
            <!-- FOTO DE PERFIL -->
            <img src="/img/avatar.png" alt="avatar" class="avatar">
        </div>
            <h4>Preferencias</h4>
        <div class="division" id="pref">
            
        </div>
        
        
    </div>

    <footer></footer>
</div>
<?php require_once 'parcial/footer.php'; ?>
</body>
<script src="/js/miPerfil.js"></script>
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>


</html>
