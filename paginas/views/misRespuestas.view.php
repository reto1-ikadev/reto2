<?php
$css = [
    '/styles/misRespuestas.css'
];

?>
<?php require_once 'parcial/header.php';
include_once "../Db/respuesta_db.php";

?>

<body>
    <div id="main">
        <div class=pregunta>
            <!--AQUI SE GENERA EL TITULO DE LA PREGUNTA-->
            <h3><?= $titulo ?></h3>
            <div class = 'cont'><p><?= $pregunta[0]->contenido ?></p> </div>
            <button class='boton'>Responder</button>
            <intput type = 'hidden' class = 'oculto' id = <?= $_GET['id'] ?>>
            
            <!-- Aqui se carga contenido de la pregunta -->
            
        </div>

        <div class="division">

            <p></p>
            <h2>Respuestas:</h2>

                <?php
                    if($respuesta != null){
                        foreach ($respuesta as $id => $value) {?>
                            <div class='interior'>
                                <div class = 'numEmple'>
                                   <h3 class ='tituloR'> <?="nº empleado " . $value['empleado']. " Nombre: ". $value['nombreEmpleado'] ." ".$value['apellido']?></h3>
                                </div>
                                <?=  $value['contenido'] ?> <br>
                                <?php if(respuestaContieneArchivo($value['idRespuesta'])){
                                    $idRespuesta = $value['idRespuesta'];
                                    $idArchivo = buscaridArchivo($idRespuesta);
                                    $archivo = recojerArchivo($idArchivo);
                                    $ruta = $archivo[0]->ruta;
                                    $nombre = $archivo[0]->nombre;
                                    
                                    ?><a class="archivos" href="<?= $ruta ?>" download="<?= $nombre ?>">Archivo Adjunto</a>
                                  <?php  
                                }
                                    
                                    ?>

                            </div>  
                    <?php
                    }?>
                <?php
                }else{?>
                <div class='interior'>
                    <p>Esta pregunta todavia no tiene respuestas</p>
                </div>
                <?php
                }
                ?>
                
                
        </div> 
        <div class="enlaces">
        <a class='boton' href="pprincipal.php">Inicio</a> &nbsp;<a class='boton' href="miPerfil.php?accion=cargar">Mi Perfil</a>
        </div>
    </div>

    <?php require_once 'parcial/footer.php'; ?>
    <script src="../js/cambioPreferencias.js"></script>
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="../js/misRespuestas.js"></script>
</body>