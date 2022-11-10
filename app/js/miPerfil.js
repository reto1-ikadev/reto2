"use strict";
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
/*BOTON */
var boton = document.getElementsByClassName("boton");
console.log(boton);
boton[0].addEventListener("click",validar);

/*COMBO*/
var departamentos = document.getElementById("dept");
departamentos.addEventListener("change", guardarDept);
var dept;

/**Esta funcion guarda el departamento en una variable */
function guardarDept(event){
    dept = event.target.value;
    console.log(dept);
}
/**Esta funcion valida los datos */
function validar(){
    try{
        var nombre = document.getElementById("nombre").value;
        var apellido = document.getElementById("apellido").value;
        var expRegNombre = new RegExp(/[A-Z][a-z]+/);

        var correo = document.getElementById("correo").value;
        var expRegCorreo = new RegExp(/[\w]+@{1}[a-z]+\.[a-z]{2-3}/);

        var pass = document.getElementById("pass");
        var expRegPass = new RegExp(/[0-9]{8}/);

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
            if(!expRegNombre.test(correo)){
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
        crearObjetoUsuario();

    }catch(error){
        alert(error);
    }

}
function crearObjetoUsuario(){
    usu = new Usuario(nombre,apellido,correo,dept,pass);
    console.log(usu);
}

