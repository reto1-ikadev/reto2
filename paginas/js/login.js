"use strict";

// En caso de que clickeen el boton registrar se abra la ventana registrar.
document.getElementById("registro").addEventListener('click', function() {
    window.open("controladores/registro.php");
});
//Se crea una cookie con los valores por defecto de preferencias. 
document.cookie = "preferencias = roboto,#0a0a0a,14 ";"max-age=360000;path=/";
