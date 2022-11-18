<?php
$css = [
    '/styles/misRespuestas.css'
];

?>
<?php require_once 'parcial/header.php';
?>

<body>
    <div id="main">
        <h1>Preferencias del usuario</h1>
        <div class="division">
            <form id="formulario">
                    <!-- Al cargar la pagina se envia el $get accion cargar. Se piden los datos a la bd y se cargan en el value del input -->
                    <input type="radio" name="fuente" id="courier" value = 'courier'>
                    <label for="courier">Maquina de escribir</label><!-- Esto escrito en el tipo de letra Courier -->
                    <br>
                    <input type="radio" name="fuente" id="arial" value = 'arial'>
                    <label for="arial">Clasica</label><!-- Esto escrito en el tipo arial -->
                    <br>
                    <input type="radio" name="fuente" id="cursiva" value = 'cursiva'>
                    <label for="cursiva">Cursiva</label><!-- Esto escrito por defecto cursiva -->
                    <br>
                    <input type="radio" name="fuente" id="roboto" value = 'roboto' checked>
                    <label for="roboto">Por defecto</label><!-- Esto escrito en el tipo roboto -->
                    <br>    
                    <p>Color de la fuente:</p>
                    <input type="color" name="color" id="color">
                    <br>
                    <p>Tamaño de la letra:</p>
                    <input type="range" name = "size" id= "size" min ='10' max = '20' value=13>
                    <br><br>
                    <button class="boton" type="submit">Enviar</button>    

            </form>
        <div>
                    
    </div>
                  
        </div>
        <a class='boton' href="miPerfil.php?accion=cargar">Volver</a>

    </div>

    <?php require_once 'parcial/footer.php'; ?>
    <script src="/js/preferencias.js"></script>
</body>
