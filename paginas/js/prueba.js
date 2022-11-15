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
   
    alert(id);
}


fav = document.getElementsByName('fav');
for (var i = 0; i < fav.length; i++) {
    fav[i].addEventListener('click', function () {
        var id = this.id;
        var datos = id;
        enviarDatos(datos);
     
        });
    };

    //function to send the id of the question to the php file
function enviarDatos(datos){
    window.location.href = "?id"+datos+"&numEmple=12345";
 
}