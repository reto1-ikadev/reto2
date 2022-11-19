<?php
$css = [
    '/styles/misRespuestas.css'
];

?>
<?php require_once 'parcial/header.php';
?>

<body>
    <div id="main">
        <div class=pregunta>
            <!--AQUI SE GENERA EL TITULO DE LA PREGUNTA-->
            <h3><?= $titulo ?></h3>
            <div class = 'cont'><p><?= $pregunta[$id]['contenido']?></p> </div>
            <!-- Aqui se carga contenido de la pregunta -->
            

        </div>
        <div class="division">

            <p></p>
            <h4>Respuestas:</h4>

                <?php
                    if($respuesta != null){
                        foreach ($respuesta as $id => $value) {?>
                            <div class='interior'>
                                <div class = 'numEmple'>
                                    <?="nº empleado " . $value['empleado']. " Nombre: ". $value['nombreEmpleado'] ." ".$value['apellido']?>
                                </div>
                                <?=  $value['contenido'] ?>
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
        <a class='boton' href="miPerfil.php?accion=cargar">Volver</a>

    </div>

    <?php require_once 'parcial/footer.php'; ?>
</body>