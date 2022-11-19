<?php
$css = [
    '/styles/pprincipal.css'
];
require_once 'parcial/header.php';

?>

<body>

    <div class="nav">
        <a href="aaa">Guias</a>
        <a href="#">Tutoriales</a>
        <a href="#">Mis Preguntas</a>
    </div>
    <div class="cont-prin">

        <div class="slide">
            <div class="anadir">
                <h4>Añadir Pregunta</h4>
                <!--<input type="submit" id="accion" value="Añadir"> -->
                <button id='nPregunta'>Añadir</button>
            </div>
            <div class="filtros">
                <h4>Filtros</h4>

                <div class="filtro">
                    <form action="" method="get" class="filtro">
                        <label for="fechInicio">Fecha Inicio:</label>
                        <input type="date" id="fechInicio" name="fechInicio">
                        <br>
                        <label for="fechaFinal">Fecha Final:</label>
                        <input type="date" id="fechaFinal" name="fechaFinal">
                        <br>
                        <label for="tags">Tags:</label>
                        <select name="tags" id="tags">
                            <option value="">-------------</option>
                            <option value="mecanica">Mecanica</option>
                            <option value="electricidad">Electricidad</option>
                            <option value="electronica">Electronica</option>
                            <option value="diseño">Diseño</option>
                        </select>
                        <br>
                        <input type="submit" value="Filtar">
                    </form>
                </div>
            </div>
        </div>
        <div id="main" class="main">
            <h4>Preguntas</h4>
            

        </div>
        <div class="popular">
            <h4>Preguntas Populares</h4>
        </div>

    </div>

    </div>
    <script src="../js/pprincipal.js"></script>
    <script src="../js/prueba.js"></script>
    <script src="../js/cambioPreferencias.js"></script>
    <?php require_once 'parcial/footer.php'; ?>