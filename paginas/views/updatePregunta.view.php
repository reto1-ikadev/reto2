<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Modificar pregunta</title>
    <link rel="stylesheet" href="../styles/nuevaPregunta.css">
</head>
<body>
    <?php session_start();?>
    <div id="division">
        <?php 
            if(isset($_GET['id'])){
                $id = $_GET['id'];
            }
        ?>
        <h1>Modificar pregunta </h1>
        <form action="updatePregunta.php" method="get">
            <div class= 'lineaF'>
            <label for="titulo">T&iacute;tulo:</label>
            <input type="text" name ='titulo' id='titulo' placeholder="Escribe el titulo de la pregunta">
            </div>

            <div class= 'lineaF'>
            <label for="contenido">Contenido:</label>
            <textarea name="contenido" id="cont" cols="50" rows="10" placeholder="Escribe tu pregunta"></textarea>
            </div>

            <div class= 'lineaF'>
            <label for="tags">Tags:</label>
            <div id="tags">
            <div><input type="radio" name="tag" id="general" value="general">General</div> <div><input type="radio" name="tag" id="mecanica" value="mecanica" required>Mecanica</div><div><input type="radio" name="tag" id="electricidad" value="electricidad">Electricidad</div>
            <div><input type="radio" name="tag" id="electronica" value="electronica">Electronica</div>  <div><input type="radio" name="tag" id="diseño" value="diseño">Diseño</div>
        
            <input type="hidden" id="idPregunta" name="idPregunta" value ="<?= $id ?>">

        </div>
            
            </div>
            <input type="hidden" name="empleado" value ="<?= $_SESSION['numEmple']?>"><!-- El numero hay que cogerlo de $_sesion -->
            <input type="submit" value="Enviar" class ="boton" >
        </form>

    </div>
    <script languaje='javascript' type='text/javascript' src='/js/nuevaPregunta.js'></script>
</body>

</html>
