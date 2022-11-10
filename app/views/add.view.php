<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Add</title>
        <style>
        @import url('https://fonts.googleapis.com/css2?family=Gruppo&family=Roboto:wght@100;300;400;500;700;900&display=swap');
        </style>
        <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />
        <link rel="stylesheet" href="../styles/add.css">
    </head>
    <body>

        <div id="contenedor">

            <div id="titulo">
                <h3> AÑADIR </h3> <span class="material-symbols-outlined">add_comment</span>
            </div>

            <form action="add.php" method="get">

                <div id="cab">
                    <input type="text" id="cab" name="cab" placeholder="TITULO">
                </div>

                <div id="tags">
                    <label for="tags">TAGS</label>
                    <select id="select">
                        <option name="1" value="1">1</option>
                        <option name="2" value="2">2</option>
                        <option name="3" value="3">3</option>
                    </select>
                </div>

                <div id="desc">
                    <textarea name="desc" id="desc" cols="47" rows="8" placeholder="DESCRIPCION"></textarea>
                </div>

                <div id="bot">
                    <input type="submit" id="aceptar" class="boton" value="Aceptar">
                    <input type="submit" id="aceptar" class="boton" value="Borrar">
                </div>

            </form>

        </div>

    </body>
    <script src="add.js"></script>
</html>