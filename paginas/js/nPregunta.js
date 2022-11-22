"use strict";
var idPregunta = document.getElementById('idPregunta').value;
console.log(idPregunta)



async function recibirDatos(idPregunta){
    let response = await fetch('/controladores/cargarPreguntaParaModificar.php?id=' + idPregunta,{
        method: 'GET'
    });
    let result = await response.json();
   
    return result;   
}
function cargarDatos(){
    alert(idPregunta);
recibirDatos(idPregunta).then(function(data){
    console.log(data);
    document.getElementById('titulo').value = data.pregunta[0].titulo ;
    document.getElementById('cont').value = data.pregunta[0].contenido ;
    document.getElementById('idPregunta').value = idPregunta;
    var radio = document.getElementsByName('tag');

    for(var x =0; x<radio.length; x++){
        if(radio[x].value = data.pregunta[0].tags){
            radio[x].checked =true;
        }
    }


});
}
cargarDatos();