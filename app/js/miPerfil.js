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


var boton = document.getElementsByClassName("boton");
console.log(boton);
boton[0].addEventListener("click",validar);
var departamentos = document.getElementById("dept");
departamentos.addEventListener("change", guardarDept);
var dept;
function guardarDept(event){
    dept = event.target.value;
    console.log(dept);
}

function validar(){
    try{
        var nombre = document.getElementById("nombre").value;
        var expRegNombre = new RegExp(/[A-Z][a-z]+/);
        var apellido = document.getElementById("apellido").value;
        var correo = document.getElementById("correo").value;
        var expRegCorreo = new RegExp(/[\w]+@{1}[a-z]+\.[a-z]{2-3}/);
        
       
        
        
        var pass = document.getElementById("pass");

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


    }catch(error){
        alert(error);
    }
    

}

