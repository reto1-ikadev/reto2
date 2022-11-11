"use strict";

   console.log("fichero miPerfil.js"); 



console.log()
class Usuario{
    constructor(nombre, apellido, correo, departamento, pass){
        this.nombre = nombre;
        this.apellido = apellido;
        this.correo = correo;
        this.departamento = departamento;
        this.pass = pass;
    }
}
var usu;


/* GET ELEMENTOS */
/*
var departamentos = document.getElementById('dept');
departamentos.addEventListener('change', guardarDept);
/*BOTON */

var formulario = document.getElementById('formulario');
formulario.addEventListener('submit', function(e){
    e.preventDefault();
    var datos = new FormData(formulario);
    typeof datos;
   // console.log(datos.get('nombre'));
    validar(datos);
} )

/**Esta funcion guarda el departamento en una variable
function guardarDept(event){
    dept = event.target.value;
}*/

/**Esta funcion valida los datos */
function validar(datos){
    try{
        console.log("validar");
        var nombre = datos.get('nombre');
        console.log(nombre);
        console.log("en la funcion validar");
        var apellido = datos.get('apellido') ;
        var expRegNombre = new RegExp(/[A-Z][a-z]+/);

        var correo = datos.get('correo');
       var expRegCorreo = new RegExp(/[a-zA-Z0-9_]+([.][a-zA-Z0-9_]+)*@[a-zA-Z0-9_]+([.][a-zA-Z0-9_]+)*[.][a-zA-Z]{2,5}/);
       
        var pass = datos.get('pass');
        var expRegPass = new RegExp(/[0-9]+/);

        var dept = document.getElementById('dept').value;
        datos.append('departamento',dept);
        
        console.log(dept);

        var departamento = datos.get('departamento');
       // var departamento = datos.get(departamento);

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
        }/*else{
            if(!expRegPass.test(pass)){
                throw "La contraseña no tiene el formato correcto";
            }
        }*/
        /*
        fetch('main.php',{
            method: 'POST',
            body: datos
        })
            .then( res => res.json())
            .then( data => {
                console.log(data)
        })*/
        
        var jsonUsu = crearObjetoUsuario(datos);
         
        enviarDatos(datos);

    }catch(error){
        alert(error);
    }

}
async function enviarDatos(datos){
    let response = await fetch('main.php',
    {
    method: 'POST',
    
    body: datos
    });
    let result = await response.json();
    console.log(result);
}


function crearObjetoUsuario(datos){
    /*No sé por que razón tengo que poner .value, si no lo pongo me coge el input*/
    usu = new Usuario(datos.get('nombre'),datos.get('apellido'),datos.get('correo'),datos.get('dept'),datos.get('pass'));
    var jsonUsu = JSON.stringify(usu);
    console.log(jsonUsu);
    return jsonUsu;
}
