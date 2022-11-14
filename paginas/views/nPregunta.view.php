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
            <select name="tags" id="tag">
                <option value="uno">Uno</option>
                <option value="dos">Dos</option>
                <option value="tres">Tres</option>
            </select>
            </div>
            <input type="hidden" name="empleado" value = 'Coger el numEmple de $sesion'>
            <input type="submit" value="Enviar" class ="boton" >
        </form>

    </div>
</body>
</html>