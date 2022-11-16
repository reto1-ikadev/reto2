"use strict";

// En caso de que clickeen el boton registrar se abra la ventana registrar.
document.getElementById("registro").addEventListener('click', function() {
    window.open("/index.php?registrar=si");
});