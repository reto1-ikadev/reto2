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

