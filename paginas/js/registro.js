"use strict"

document.getElementById("borrar").addEventListener("click", borrar);
/*
var formulario = document.getElementById('formulario');
formulario.addEventListener('submit', function(e){
    e.preventDefault();
    var datos = new FormData(formulario);
    typeof datos;
   // console.log(datos.get('nombre'));
    validar(datos);
} )


function validar(datos){
    try{
        console.log("validar");

        var nombre = datos.get('nombre');
        console.log(nombre);

        var apellido = datos.get('apellido');
        var expRegNombre = new RegExp(/[A-Z][a-z]+/);

        var correo = datos.get('correo');
        var expRegCorreo = new RegExp(/[a-zA-Z0-9_]+([.][a-zA-Z0-9_]+)*@[a-zA-Z0-9_]+([.][a-zA-Z0-9_]+)*[.][a-zA-Z]{2,5}/);
       
        var pass = datos.get('pass');
        var expRegPass = new RegExp(/[0-9]+/);

        var dept = document.getElementById('dept').value;
        datos.append('dept',dept);      
        console.log(dept);

        if(nombre == ""){
            alert("El nombre es un campo obligatorio");
        }else{
            if(!expRegNombre.test(nombre)){
                throw "El nombre no tiene el formato correcto";
            }
        }
        if(apellido == ""){
            alert("El apellido es un campo obligatorio");
        }else{
            if(!expRegNombre.test(apellido)){
                throw "El apellido no tiene el formato correcto";
            }
        }
        if(correo == ""){
            alert("El correo es un campo obligatorio");
        }else{
            if(!expRegCorreo.test(correo)){
                throw "El correo no tiene el formato correcto";
            }
        }
        if(pass == ""){
            alert("La contraseña es un campo obligatorio");
        }else{
            if(!expRegPass.test(pass)){
                throw "La contraseña no tiene el formato correcto";
            }
        }
        
        enviarDatos(datos);
        
    }catch(error){
        alert(error);
    }

}

async function enviarDatos(datos){
    console.log(typeof(datos));
    let response = await fetch('/controladores/registro.php',
    {
    method: 'POST',
    body: datos
    });
    let result = await response.json();
    if(result.success){
        Swal.fire(result.success);
    }

}*/

function borrar(){
    document.getElementById("formulario").reset();
}