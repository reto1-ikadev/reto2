document.getElementById('nGuia').addEventListener('click', mostrarAñadirGuia);



function mostrarAñadirGuia(){
    var divform = document.getElementById('formularioGuias');
    var cantdivint = document.getElementsByClassName('interior');
    if(cantdivint.length < 1){
    let divInterior = document.createElement('div');
        divInterior.setAttribute('class', 'interior');
        divInterior.innerHTML = "<form id='formGuias' enctype='multipart/form-data'>"+
        "<div class= 'lineaF'>"+
        "<label for='titulo'>T&iacute;tulo: </label>" +
        "<input type='text' name ='titulo' id='titulo' placeholder='Escribe el titulo de la guia' required></div>"+
        "<div class= 'lineaF'>"+
        "<label for='archivo'>Añade la Guia: </label>" +
        "<input type='file' name ='archivos' id='archivos' title=' s' required/></div>"+
        "<div class= 'lineaF'>"+
        "<button class='boton' id='enviarRespuesta' type='submit'>Enviar</button></div>"+
        "</form>";
        divform.appendChild(divInterior);
        var botonEnviar = document.getElementById('enviarRespuesta');
        console.log(botonEnviar);
        prepararEnvio(botonEnviar);
    }
}

function prepararEnvio(botonEnviar, pregunta){
    botonEnviar.addEventListener('click', function(e){
        e.preventDefault();
        var datos = new FormData(formGuias);
            enviarRespuesta(datos);
        
    });
    
}
async function enviarRespuesta(datos){
    enviado = false;
    let response = await fetch("/controladores/nuevaGuia.php",{
        method: 'POST',
        body: datos,
    });
    let result = await response.json();
    if (result.success != null) {
        console.log(result.success);
            Swal.fire('Se ha añadido la subido la guia correctamente');
            setInterval(function(){
            location.reload();}, 2000);
            enviado = result.result;
        };
      }

recibirDatos().then(function (data) {
    buscarArchivos(data);
    console.log(data);

});


async function buscarArchivos(datos) {
    console.log(datos.guia[0].id);
    let main = document.getElementById('main');
    for (let i = 0; i < datos.guia.length; i++) {
        cargarArchivos(datos.guia[i].idArchivo).then(function (data) {
            let div = document.createElement('div');
            div.classList.add('guia');
            div.innerHTML = "<span><b>Titulo: </b>" + datos.guia[i].contenido + "</span><br>" + 
            "<a href='"+ data.archivo[0].ruta + "' download='"+ data.archivo[0].nombre +"'>Descargar</a>";
            main.appendChild(div);
          
        });
      }
}



async function recibirDatos() {
    let response = await fetch('/controladores/cargarGuias.php',
        {
            method: 'GET'

        });
    let result = await response.json();
    return result;
}

async function cargarArchivos(guia) {
    let response = await fetch('/controladores/cargarArchivos.php?id=' + guia,
    {
        method: 'GET'

    });
let result = await response.json();
return result;

}