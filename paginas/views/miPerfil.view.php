<?php
$css = [
    '/styles/miPerfil.css'
];

?>
<?php require_once 'parcial/header.php'; 
    session_start();
?>
<!-- AQUI SE IMPORTA EL ENCABEZADO -->

<div id = "contenedor">
    
    <div id = "main">
        <h4>Mis datos:</h4>
        <div class = "division">
            <form id="formulario">
            <!-- Al cargar la pagina se envia el $get accion cargar. Se piden los datos a la bd y se cargan en el value del input -->
            <div class = "lineaF">
                    <label for="nombre">Nº empleado</label>
                    <input type="text" name="numEmple" value = "<?= $_SESSION['numEmple'] ?>" readonly>
                </div>
                <div class = "lineaF">
                    <label for="nombre">Nombre</label>
                    <input type="text" name="nombre" value="<?= $_SESSION['nombre'] ?>"readonly >
                </div>
               
                <div class = "lineaF">
                <label for="apellido">Apellido</label>
                <input type="text" name="apellido" value="<?= $_SESSION['apellidos'] ?>" readonly >
                </div>

                <div class = "lineaF">
                    <label for="correo">eMail</label>
                    <input type="text" name="correo" value="<?= $_SESSION['correo']?>" >
                </div>
                
                <div class = "lineaF">
                    <label for="dept">Departamento</label>
                    <input type="text" name="dept" value="<?= $_SESSION['departamento'] ?>"readonly >
                </div>

                <div id="botones"> 
                <input type="hidden" name="accion" value="modificar">
                <button class = "boton" type ="submit">Modificar</button>
                </div>
                
            </form>
        </div>

        <h4>Mis preguntas:</h4>
        <div class = "division">
            <?php
                if(isset($misPreguntas)){
                    foreach ($misPreguntas as $pregunta => $value) {?>
                    <div class = "pregunta">
                    <h4><?= $value['titulo']; ?></h4>
                    <div><span class="material-symbols-outlined">delete</span><span class="material-symbols-outlined">edit</span></div>
            </div>
                <?php
                }
                }
            ?>
        </div>

        <h4>Mis favoritos:</h4>
        <div class = "division">
            <div class = "favorito">
                    <h4>Aquí se genera el titulo de la pregunta favorita</h4>
                    <div><span class="material-symbols-outlined">star_rate</span></div>
            </div>
        </div>
        <h4>Mis Preferencias:</h4>
        <div class = "division">
            <div class = "preferencias">
                    
            </div>
        </div>
    </div>

    <div id = "aside">
        <!-- FOTO DE PERFIL Y NOTIFICACIONES -->
        <div id="fotoPerfil">
            <!-- FOTO DE PERFIL -->
            <img src="/img/avatar.png" alt="avatar" class="avatar">
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
<?php require_once 'parcial/footer.php'; ?>
</body>
<script src="/js/miPerfil.js"></script>
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>

</html>