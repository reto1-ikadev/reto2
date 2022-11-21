var pregunta = document.querySelector('div.pregunta');
//a esta division le voy a añadir la div para responder

var botones = document.querySelectorAll('button');
//console.log(boton);
for(var boton of botones){
    if(boton.className == 'boton'){
        boton.addEventListener('click', mostrarAñadirRespuesta);
    }
}
var oculto = document.getElementsByClassName('oculto');
console.log(oculto);
var idPregunta = oculto[0].id;
//console.log(idPregunta);

function mostrarAñadirRespuesta(){
    //console.log('mostrarRespuesta');
    
    var pregunta = document.getElementsByClassName('pregunta');
        
        let divInterior = document.createElement('div');
        divInterior.setAttribute('class', 'interior');
        divInterior.innerHTML = "<form id='formulario'>"+
        "<textarea class='contenido' rows='10' cols='50' ></textarea>"+
        "<input type='hidden' name='id' value='"+ idPregunta +"'>" +"<div>" +
        "<button class='boton' id='enviarRespuesta' type='submit'>Enviar</button><input type='file' name='archivos'>"+"</div>"+
        "</form>";
        pregunta[0].appendChild(divInterior);
        var botonEnviar = document.getElementById('enviarRespuesta');
        console.log(botonEnviar);
        prepararEnvio(botonEnviar);
    
}

function prepararEnvio(botonEnviar, pregunta){
    botonEnviar.addEventListener('click', function(e){
        e.preventDefault();
        var enviado
        var datos = new FormData(formulario);
        var texto = document.querySelector('textarea');
        var contenido = texto.value;
        var comprobado =validarContenido(contenido);
        var file = document.querySelector('input[type=file]').files[0];
        datos.append('file', file);
        if(comprobado){
            datos.append('contenido',contenido);
            //console.log(datos.get('contenido'))
            enviarRespuesta(datos);
        }
        
    });
    
}
async function enviarRespuesta(datos){
    enviado = false;
    let response = await fetch("/controladores/recibirRespuesta.php",{
        method: 'POST',
        body: datos,
    });
    let result = await response.json();
    if (result.success != null) {
        console.log(result.success);
            Swal.fire('Se ha añadido la respuesta');
            setInterval(function(){
            location.reload();}, 2000);
            enviado = result.result;
        };
      }

function validarContenido(contenido){
    var comprobado = false;
    try{
        if(contenido != ''){
            comprobado =true;
            return comprobado;
        }else{
            throw 'El contenido no puede ir vacio';
        }
    }catch(error){
        alert(error);
    }
    
}


