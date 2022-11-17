"use strict";

console.log("fichero miPerfil.js"); 

var fav = document.getElementsByName('fav');
for (var i = 0; i < fav.length; i++) {
    fav[i].addEventListener('click', function () {
        var id = this.id;
        alert(id);
        var datos = id;
        enviarId(datos);
        });
    };

    function enviarId(datos){
        window.location.href = "/controladores/miPerfil.php?id="+datos;
    }

//Guardo el elemento formulario en una variable
var formulario = document.getElementById('formulario');
formulario.addEventListener('submit', function(e){
    e.preventDefault(); //Evita que se envien los datos del servidor en cuando se pulsa submit
    var datos = new FormData(formulario); //Creo un objeto FormData para recoger los datos del formulario
    
   //Valido los datos
    var validados = validar(datos);

    if(validados){
        enviarDatos(datos); //fetch para enviar los datos a php
    }
    
} );
//La respuesta se cierra al dar al boton 
var botonCerrarRespuesta = document.getElementsByClassName('boton');
console.log(botonCerrarRespuesta);
botonCerrarRespuesta.addEventListener('click', borrarDivisionRespuesta);


function borrarDivisionRespuesta(){
    console.log('hola');
}


/**Esta funcion valida los datos. Retorna false si hay algun dato incorrecto*/
function validar(datos){
    try{
        var accion = datos.get('accion');
        console.log(accion);

        var datosOk = true;
        var campoIncorrecto = "";

        var correo = datos.get('correo');
        console.log(correo)
        var expRegCorreo = new RegExp(/[a-zA-Z0-9_]+([.][a-zA-Z0-9_]+)*@[a-zA-Z0-9_]+([.][a-zA-Z0-9_]+)*[.][a-zA-Z]{2,5}/);


        if(correo == "" || !expRegCorreo.test(correo) ){
            datosOk = false;
            campoIncorrecto += " correo";
        }
        if(!datosOk){
            throw "El/los campo(s) "+ campoIncorrecto + " no es correcto";
        }
        return datosOk;
    
    }catch(error){
        alert(error);
    }

}

//Esta funcion envia los datos a main.php y recibe una respuesta
async function enviarDatos(datos){
    let response = await fetch('/controladores/main.php',
    {
    method: 'POST',
    body: datos

    });
    let result = await response.json();
    if(result.success){
        Swal.fire(result.success);
    }

}
