//add listener to the name ampliar and get the id of the element not jquery
ampliar = document.getElementsByName('ampliar');
for (var i = 0; i < ampliar.length; i++) {
    ampliar[i].addEventListener('click', function () {
        var id = this.id;
        abrirPreguntaSeleccionada(id);
        });
    };

function abrirPreguntaSeleccionada(id) {
    var idPregunta = id;
    var idPregunta = idPregunta.substring(8, idPregunta.length);
    alert(id);
}
