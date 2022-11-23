<?php
$css = [
    '/styles/pprincipal.css'
];
require_once 'parcial/header.php';
?>


    <div class="cont-prin">

        <div class="slide">
            <div class="anadir">
                <button class="boton" id='nPregunta'>Añadir Pregunta</button>
              </div>
            <div class="filtros">
                <div class="filtro">
                    <form id="filtros" class="filtro">
                        <h2>Filtros</h2>
                        <br>
                        <input type="text" name="busqueda" id="busqueda" placeholder="Titulo">
                        <br>
                        <label for="fechaInicio">Fecha Inicio:</label>
                        <input type="date" id="fechaInicio" name="fechaInicio">
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
                        <input class="boton" type="submit" value="Filtrar">
                    </form>
                </div>
            </div>
        </div>
        <div id="main" class="main">


        </div>
        <div id="popular" class="popular">
            <h4>Preguntas Populares</h4>
        </div>

    </div>
    <script src="../js/pprincipal.js"></script>
    <script src="../js/prueba.js"></script>
    <script src="../js/cambioPreferencias.js"></script>

    <?php require_once 'parcial/footer.php'; ?>