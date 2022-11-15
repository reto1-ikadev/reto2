"use strict";

console.log("fichero miPerfil.js"); 

var estrellita = document.getElementById("f1").getElementsByClassName("material-symbols-outlined")[0];

   estrellita.addEventListener('click', function() {
    if(estrellita.style["color"] == "yellow") {
        estrellita.style["color"] = "green";
        deleteFav(document.getElementById("f1"));
    } else {
        estrellita.style["color"] = "yellow";
        datos = (numEmple => $numEmp, idPregunta => $idP);
        addFav(datos);
    }
    
   });

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
    
} )


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
/* Esta funcion borra las preguntas favoritas del usuario*/
function deleteFav() {

}

/* Esta funcion añade preguntas favoritas de un usuario*/
async function addFav(datos) {
    let response = await fetch('../Db/favoritoF.php',
    {
    method: 'POST', 

    body: datos
    });
    let result = await response.json();
    if(result.success){
        Swal.fire(result.success);
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
