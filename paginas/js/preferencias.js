"use strict";
console.log("preferencias.js");
var elementobutton = document.querySelector("button.boton");
console.log(elementobutton);

elementobutton.addEventListener('click', function(e){
    e.preventDefault(); 
    generarVistaPreferencias();
   // guardarPreferencias();
});
function generarVistaPreferencias(){
    console.log('hola');
}

function guardarPreferencias(){
    var radios = [];
    console.log('funcion guardar preferencias');
    //Obtengo todos los inputs del formulario
    var formulario = document.querySelectorAll('input');
    console.log(formulario);
    //Consigo un array con los radios
    radios = obtenerRadios();
    console.log(radios);
    //Obtengo el valor del radio seleccionado
    var fuente = obtenerValorFuente(radios);
    console.log(fuente);
    //obtenerColor
    var color = obtenerColor();
    console.log(color);
    //obtener tamaño
    var fontSize = obtenerSize();
    console.log(fontSize);

    var cadenaPreferencias = '"'+ fuente +','+ color +','+ fontSize + '"';
    console.log(cadenaPreferencias); 

    document.cookie = "preferencias = "+cadenaPreferencias+ "; max-age=360000;path=/";
    var todas = document.cookie;
    console.log(todas);
    
}

function obtenerSize(){
    for(var elemento of formulario){
        if(elemento.type == 'range'){
            var size = elemento.value;
        }
    }
    return size;
}

function obtenerColor(){
    for(var elemento of formulario){
        if(elemento.type == 'color'){
            var color = elemento.value;
        }
    }
    return color;
}
/**
 * Esta funcion obtiene el valor del radio seleccionado
 * @param {array con los radioButtons} radios 
 * @return  devuelve el valor de la fuente
 */
function obtenerValorFuente(radios){
    let i = 0;
    console.log(radios.length);
    for(i; i<radios.length && !radios[i].checked;i++){}
        if(i<radios.length){
            var fuenteElegida = radios[i].value;
        }
    return fuenteElegida;
}

/**Esta funcion obtiene los radioButtons del formulario y hace un array con ellos
 * @return el array con los radiosButtons
 */
function obtenerRadios(){
    var radios = [];
    for(var elemento of formulario){
        if(elemento.type == 'radio'){
            radios.push(elemento);
            
        }
    }
    return radios;
}

