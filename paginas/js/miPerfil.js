"use strict";

console.log("fichero miPerfil.js");
var cookPref;
var fav = document.getElementsByName("fav");
for (var i = 0; i < fav.length; i++) {
  fav[i].addEventListener("click", function () {
    var id = this.id;
    var datos = id;
    enviarId(datos);
  });
}
//Necesito el id de la pregunta y el listener del lapiz
var lapiz = document.getElementsByTagName('span');
var editar;
for(var i=0; i<lapiz.length;i++){
  //console.log(lapiz[i].textContent);
  if(lapiz[i].textContent=='edit'){
    editar = lapiz[i];
    editar.addEventListener('click', abrirVentanaPregunta);
  }
}


function abrirVentanaPregunta(event){
  var idPregunta = event.target.id;
  console.log(idPregunta);
  //Ya tengo el id de la pregunta
  window.open("../controladores/nPregunta.php?accion=editar&id="+idPregunta, 'Nueva pregunta', 'width=900,height=800');
  
}

function enviarId(datos) {
  window.location.href =
    "/controladores/miPerfil.php?idF=" + datos;
    window.location.href =
    "/controladores/miPerfil.php?accion=cargar";
}

//Guardo el elemento formulario en una variable
var formulario = document.getElementById("formulario");
formulario.addEventListener("submit", function (e) {
  e.preventDefault(); //Evita que se envien los datos del servidor en cuando se pulsa submit
  var datos = new FormData(formulario); //Creo un objeto FormData para recoger los datos del formulario

  //Valido los datos
  var validados = validar(datos);

  if (validados) {
    enviarDatos(datos); //fetch para enviar los datos a php
  }
});
//Mostrar preferencias: Obtengo todos los botones y le añado un listener al que tiene value preferencias
var botones = document.getElementsByClassName("boton");

function comprobarSiExiteLaDivPreferencias(){
    var comprobacion = document.getElementById('formulario2');
    //console.log(comprobacion);
}

/**
 * Funcion que genera de forma dinámica el apartado de preferencias.
 * Cogemos el boton enviar y lo pasamos como parametro a la
 * funcion enviarPreferencias
 */
function generarPreferencias(preferencias) {
  //no puede tener return
  console.log("funcion generar preferencias");
  let pref = document.getElementById("pref");
  let division = document.createElement("form");
  division.setAttribute("class", "formulario2");
  division.setAttribute("id", "formulario2");
  division.innerHTML =
    
        "<h4>Tipo de fuente:</h4>" +

        "<div class='linea'>" +
          "<label for='courier'>Maquina de escribir</label>" +
          "<input type='radio' name='fuente' id='courier' value = 'courier'>" +
          
        "</div>" +

        "<div class='linea'>" +
            "<label for='arial'>Clasica</label>" +
            "<input type='radio' name='fuente' id='arial' value = 'arial'>" +
            
        "</div>" +

        "<div class='linea'>" +
          "<label for='cursiva'>Cursiva</label>" +
            "<input type='radio' name='fuente' id='cursiva' value = 'cursiva'>" +
            
        "</div>" +
        "<div class='linea'>" +
          "<label for='roboto'>Por defecto</label>" +
            "<input type='radio' name='fuente' id='roboto' value = 'roboto' checked>" +
            
        "</div>" +
        "<div class='lineaA'>" +
            "<h4>Color de la fuente:</h4>" +
            "<input type='color' name='color' id='color' value='"+preferencias[1]+"'>" +
        "</div>" +
        "<div class= 'lineaA' >" +
            "<h4>Tamaño de la letra:</h4>" +
            "<input type='range' name = 'size' id= 'size' min ='10' max = '20' value='"+preferencias[2]+"'>" +
        "</div>" +
        "<div class='botones'>" +
          "<button class='boton' id='enviarPref' type='submit'>Enviar</button>";
  pref.appendChild(division);
  var botonEnviar = document.getElementById("enviarPref");
  //console.log(botonEnviar);
  var tipoLetra = preferencias[0];
  //console.log(tipoLetra + 'TIPO LETRA');
  var prueba = document.getElementById(preferencias[0]);
  //console.log(prueba);
  prueba.checked = true;
  
  enviarPreferencias(botonEnviar);
  
}
/**
 * Se añade el eventListener al boton enviar y llamamos a la funcion guardarPreferencias
 */
function enviarPreferencias(botonEnviar) {
  console.log("funcion enviar");
  botonEnviar.addEventListener("click", function (e) {
    e.preventDefault();
    cookPref = guardarPreferencias();
    var prueba = cookPref.split("=");
    var guardarPreferecias = prueba[1];
    var preferencias = guardarPreferecias.split(",");
    //console.log(preferencias);
    cambiarPreferencias(preferencias);
  });
}
/**
 * Guardamos en variables los valores seleccionados por el usuario, creamos la cookie preferencias y
 * le añadimos los valores.
 * @returns Retorna un string con la cookie preferencias;
 */
function guardarPreferencias() {
  var radios = [];
  console.log("funcion guardar preferencias");
  //Obtengo todos los inputs del formulario
  var formulario = document.getElementById("formulario2");
  var inputsFormulario = formulario.querySelectorAll("input");
  //console.log(inputsFormulario);
  //Consigo un array con los radios
  radios = obtenerRadios(inputsFormulario);
  //console.log(radios);
  //Obtengo el valor del radio seleccionado
  var fuente = obtenerValorFuente(radios);
  //console.log(fuente);
  //obtenerColor
  var color = obtenerColor(inputsFormulario);
 // console.log(color);
  //obtener tamaño
  var fontSize = obtenerSize(inputsFormulario);
  //console.log(fontSize);

  /*Creo una cadena con los datos que ha seleccionado el usuario para crear una cookie */
  var cadenaPreferencias = '' + fuente + "," + color + "," + fontSize + '';
  //console.log(cadenaPreferencias);

  document.cookie =
    "preferencias = " + cadenaPreferencias + "; max-age=360000;path=/";
  var cooks = document.cookie;
  //console.log(cooks);
  let arrayCookies = cooks.split(";");
  //console.log(arrayCookies);
  var expRegPref = new RegExp("preferencias");
  for (var cook of arrayCookies) {
    if (expRegPref.test(cook)) {
      var cookPref = cook;
    //  console.log(cook);
    }
  }
  return cookPref;
}
function obtenerCookie() {
  var cooks = document.cookie;
  //console.log(cooks);
  let arrayCookies = cooks.split(";");
 // console.log(arrayCookies);
  var expRegPref = new RegExp("preferencias");
  for (var cook of arrayCookies) {
    if (expRegPref.test(cook)) {
      var cookPref = cook;
   //   console.log(cook);
    }
  }
    var prueba = cookPref.split("=");
    var guardarPreferecias = prueba[1];
    var preferencias = guardarPreferecias.split(",");
    cambiarPreferencias(preferencias);
    generarPreferencias(preferencias)
}
function obtenerSize(inputsFormulario) {
  for (var elemento of inputsFormulario) {
    if (elemento.type == "range") {
      var size = elemento.value;
    }
  }
  return size;
}

function obtenerColor(inputsFormulario) {
  for (var elemento of inputsFormulario) {
    if (elemento.type == "color") {
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
function obtenerValorFuente(radios) {
  let i = 0;
  //console.log(radios.length);
  for (i; i < radios.length && !radios[i].checked; i++) {}
  if (i < radios.length) {
    var fuenteElegida = radios[i].value;
  }
  return fuenteElegida;
}

/**Esta funcion obtiene los radioButtons del formulario y hace un array con ellos
 * @return el array con los radiosButtons
 */
function obtenerRadios(inputsFormulario) {
  var radios = [];
  for (var elemento of inputsFormulario) {
    if (elemento.type == "radio") {
      radios.push(elemento);
    }
  }
  return radios;
}

/**Cambia el css para modificar las preferencias elegidas por el usuario */
function cambiarPreferencias(preferencias) {
 // console.log(preferencias[0]);
  document.querySelector("body").style.fontFamily = preferencias[0];
  document.querySelector("body").style.color = preferencias[1];
  document.querySelector("body").style.fontSize = (parseInt(preferencias[2])/16)+"em";

}

/**Esta funcion valida los datos. Retorna false si hay algun dato incorrecto*/
function validar(datos) {
  try {
    var accion = datos.get("accion");
   // console.log(accion);

    var datosOk = true;
    var campoIncorrecto = "";

    var correo = datos.get("correo");
   // console.log(correo);
    var expRegCorreo = new RegExp(
      /[a-zA-Z0-9_]+([.][a-zA-Z0-9_]+)*@[a-zA-Z0-9_]+([.][a-zA-Z0-9_]+)*[.][a-zA-Z]{2,5}/
    );

        if(correo == "" || !expRegCorreo.test(correo) ){
            datosOk = false;
            campoIncorrecto += " correo";
        }
    if (!datosOk) {
      throw "El/los campo(s) " + campoIncorrecto + " no es correcto";
    }
    return datosOk;
  } catch (error) {
    alert(error);
  }
}

//Esta funcion envia los datos del formulario con los datos del usuario a main.php y recibe una respuesta
async function enviarDatos(datos) {
  let response = await fetch("/controladores/main.php", {
    method: "POST",
    body: datos,
  });
  let result = await response.json();
  if (result.success) {
    Swal.fire(result.success);
  }
}
obtenerCookie();
