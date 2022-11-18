"use strict";
var bNpregunta = document.getElementById('nPregunta');
bNpregunta.addEventListener('click', nuevaVentana);
var numPreguntas = 0;
var paginaActual = 0;
var paginas = 0;
function nuevaVentana(event) {
    var entrada = event.target.id;
    console.log(entrada);
    switch (entrada) {
        case 'nPregunta':
            window.open("../controladores/nPregunta.php", 'Nueva pregunta', 'width=900,height=800');
            break;

        default:
            break;
    }
}


async function recibirDatos(paginaActual) {
    let response = await fetch('/controladores/cargarpreguntas.php?page=' + paginaActual,
        {
            method: 'GET'

        });
    let result = await response.json();
    return result;

}
const scrollMaxValue = () => {
    const body = document.body;
    const html = document.documentElement;

    const documentHeight = Math.max(
        body.scrollHeight,
        body.offsetHeight,
        html.clientHeight,
        html.scrollHeight,
        html.offsetHeight
    );

    const windowHeight = window.innerHeight;

    return documentHeight - windowHeight;
};




//Detect when the user scroll to the bottom of the page
var finScroll = false;
window.onscroll = function (ev) {
    if (window.scrollY >= scrollMaxValue() - 2) {
        // you're at the bottom of the page
        //prevent multiple calls
        if (finScroll == false) {
            finScroll = true;
            //load more data
            if (paginaActual < paginas) {
                paginaActual++;
                cargarPreguntas(paginaActual);
            }
        }

    }
};


function cargarPreguntas(paginaActual) {
    let posicionScroll = window.scrollY;
    recibirDatos(paginaActual + 1).then(function (data) {
        numPreguntas = data.numPreguntas;
        paginas = Math.ceil(data.numPreguntas / 8);
        //crear preguntas en el html dentro del div main
        console.log(data);
        let main = document.getElementById('main');
        for (let i = 0; i < data.preguntas.length; i++) {
            let div = document.createElement('div');
            div.setAttribute('class', 'pregunta');
            div.setAttribute('id', data.preguntas[i].id);
            div.innerHTML = "<div class=contPregunta> " +
                "<p><h3>Titulo:</h3><span> " + data.preguntas[i].titulo + " </span>" +
                "<h5>Tags:</h5><span> " + data.preguntas[i].tags + " </span></p>" +
                "<span name='fav' id=" + data.preguntas[i].id + " class='material-symbols-outlined'>star</span>"+
                "<span name='ampliar' id=" + data.preguntas[i].id + " class='material-symbols-outlined expandir'>unfold_more</span></div>";
            main.appendChild(div);
            main.appendChild(document.createElement('br'));
        }
        ponerFav();
        window.scrollTo(0, posicionScroll);
        setTimeout(function () {
            finScroll = false;
        }, 1000);
        
    });
    


}


async function preguntaFav(id){
    let response = await fetch('/controladores/preguntafav.php?id='+ id,
        {
            method: 'GET'

        });
    let result = await response.json();
    return result;
    

}


function ponerFav(){
    let fav = document.getElementsByName('fav');
    for (let i = 0; i < fav.length; i++) {
        preguntaFav(fav[i].id).then(function (data) {
           if(data){
            fav[i].classList.add('fav');
           }
        });
}
}


cargarPreguntas();
