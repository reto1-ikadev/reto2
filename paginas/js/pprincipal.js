"use strict";
var bNpregunta = document.getElementById('nPregunta');
bNpregunta.addEventListener('click', nuevaVentana);

function nuevaVentana(event){
    var entrada = event.target.id;
    console.log(entrada);
    switch (entrada) {
        case 'nPregunta':
            window.open("../controladores/nPregunta.php",'Nueva pregunta', 'width=900,height=800');            
            break;
    
        default:
            break;
    }  
}


async function recibirDatos(){
    let response = await fetch('/controladores/cargarpreguntas.php',
    {
    method: 'GET'

    });
    let result = await response.json();
    return result;

}
recibirDatos().then(function(data){
    //crear preguntas en el html dentro del div main
    console.log(data);
    let main = document.getElementById('main');
    for (let i = 0; i < data.length; i++) {
        let div = document.createElement('div');
        div.setAttribute('class', 'pregunta');
        div.setAttribute('id', data[i].id);
        div.innerHTML = "<div class=contPregunta> "+
        "<p><h3>Titulo:</h3><span> "+data[i].titulo+" </span>"+
        "<h5>Tags:</h5><span> "+data[i].tags+" </span></p></div>"+
        "<div class=contRespuesta><p><b>Ult. Resp:</b>&nbsp;<span> "+data[i].respuesta+" </span></p>"+
        "<span name='ampliar' id="+data[i].id+" class='material-symbols-outlined expandir'>unfold_more</span></div>";
        main.appendChild(div);
        main.appendChild(document.createElement('br'));
    }

});
