<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Nueva pregunta</title>
    <link rel="stylesheet" href="../styles/nPregunta.css">
</head>
<body>
    <div id="division">
        <h1>Nueva pregunta</h1>
        <form action="nPregunta.php" method="get">
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
            <input type="checkbox" name="tag1" value="uno"> Uno <input type="checkbox" name="tag2" value="dos"> Dos
            <input type="checkbox" name="tag3" value="tres"> Tres <input type="checkbox" name="tag4" value="cuatro">Cuatro
            </div>
            
            </div>
            <input type="hidden" name="empleado" value = "<?php 
                session_start();
                echo $_SESSION['usuario']['numEmple']; 
            ?>"><!-- El numero hay que cogerlo de $_sesion -->
            <input type="submit" value="Enviar" class ="boton" >
        </form>

    </div>
</body>
</html>