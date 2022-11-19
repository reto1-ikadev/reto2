"use strict";
var bNpregunta = document.getElementById('nPregunta');
bNpregunta.addEventListener('click', nuevaVentana);
var numPreguntas = 0;
var paginaActual = 0;
var paginas = 0;
var filtrado = false;

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
    if (window.scrollY >= scrollMaxValue() - 7) {
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
    if (filtrado) {
        return cargarPreguntasFiltradas(paginaActual);
    }
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
                "<span name='fav' id='star" + data.preguntas[i].id + "' class='material-symbols-outlined' onclick='agregarPreguntaFavorita(" + data.preguntas[i].id + ")'>star</span>" +
                "<a href='respuestas.php?titulo=" + data.preguntas[i].titulo + "&id=" + data.preguntas[i].id + "'><span name='ampliar' id=" + data.preguntas[i].id + " class='material-symbols-outlined expandir'>unfold_more</span></a></div>";
            main.appendChild(div);
            main.appendChild(document.createElement('br'));
        }

        window.scrollTo(0, posicionScroll);
        setTimeout(function () {
            finScroll = false;
        }, 1000);
        cargarPreguntasFavoritas();
    });



}

function agregarPreguntaFavorita(id) {
    let url = "/controladores/pprincipal.php?id=" + id;
    fetch(url, {
        method: 'GET'
    }).then(function (response) {
        return response.status;
    }).then(function (data) {
        if (data == 200) {
            // get element that callet the function
            let fav = document.getElementById('star' + id);
            if (fav.classList.contains('fav')) {
                fav.classList.remove('fav');
            } else {
                fav.classList.add('fav');
            }
        }
    });

}
async function comprobarPreguntaFavorita(id) {
    let response = await fetch('/controladores/preguntafav.php?id=' + id,
        {
            method: 'GET'

        });
    let result = await response.json();
    return result;
}


function cargarPreguntasFavoritas() {
    let fav = document.getElementsByName('fav');
    for (let i = 0; i < fav.length; i++) {
        let id = fav[i].id.substring(4);
        comprobarPreguntaFavorita(id).then(function (data) {
            if (data) {
                fav[i].classList.add('fav');
            }
        });
    }
}

var formulario = document.getElementById('filtros');
formulario.addEventListener('submit', function (e) {
    e.preventDefault();
    var datos = new FormData(formulario);
    filtrado = datos;
    document.getElementById('main').innerHTML = "";
    paginaActual = 0;
    cargarPreguntas();

});

async function recibirPreguntaFiltros(datos, paginaActual) {
    let response = await fetch('/controladores/cargarPreguntasFiltradas.php?page=' + paginaActual,
        {
            method: 'POST',
            body: datos

        });
    let result = await response.json();
    return result;


}

function cargarPreguntasFiltradas(paginaActual) {
    let posicionScroll = window.scrollY;
    recibirPreguntaFiltros(filtrado, paginaActual + 1).then(function (data) {
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
                "<span name='fav' id='star" + data.preguntas[i].id + "' class='material-symbols-outlined' onclick='agregarPreguntaFavorita(" + data.preguntas[i].id + ")'>star</span>" +
                "<a href='respuestas.php?titulo=" + data.preguntas[i].titulo + "&id=" + data.preguntas[i].id + "'><span name='ampliar' id=" + data.preguntas[i].id + " class='material-symbols-outlined expandir'>unfold_more</span></a></div>";
            main.appendChild(div);
            main.appendChild(document.createElement('br'));
        }

        window.scrollTo(0, posicionScroll);
        setTimeout(function () {
            finScroll = false;
        }, 1000);
        cargarPreguntasFavoritas();
    });

}




cargarPreguntas();
