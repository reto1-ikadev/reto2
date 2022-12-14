/*Este JS es capaz de enviar al servidor una peticion 
que despues de obtener una respuesta con un string json este 
lo use para añadir a la tabla de notificaciones el titulo
de la respuesta nueva que aparece.*/

// Fetch a la ruta de el php con lo necesario para hacer la peticion
fetch('http://localhost/controladores/notifications.php').then(function(response) {
    if(!response.ok) { // Si la promise nos devuelvo falso quiere decir que algo salio mal
        throw new Exception("Error");
    }
        return response.text();// En caso de que salga bien devolvemos el texto con json.
    }).then(function(text) { // Ahora lo añadimos a la tabla de notificaciones.
        document.getElementsByClassName("contador")[0].innerHTML = JSON.parse(text).length; // contador hace referencia a la cantidad de notificaciones
        jsonNot = JSON.parse(text);
        for(let i = 0; i < jsonNot.length; i++) { // Añadimos en divs las respuestas nuevas.
            var element = document.createElement("div");
            var bold = document.createElement("strong");
            element.classList.add('msg');
            element.appendChild(document.createTextNode('Nueva respuesta en: '));
            bold.appendChild(document.createTextNode(jsonNot[i].titulo));
            element.appendChild(bold);
            document.getElementById('notificaciones').appendChild(element);
        }
        //document.body.appendChild(element);
        //alert(jsonNot[0].empleado_numEmple);
    }).catch(function(error) {
        alert("Error: " + error);
    });

//document.getElementsByClassName("contador")[0].innerHTML = Object.keys(jsonNot).length;

//En caso de que el usuario haga click en el span del boton de notificaciones
// este añadira o quitara la clase activo. Si esta la clase activo aparece
// el cuadro con las notificaciones, en caso contrario, no sale nada.
document.getElementById("botonNotificaciones").addEventListener('click', function() {
    document.getElementById("botonNotificaciones").classList.toggle("activo");
});

document.getElementById("botonLimpiar").addEventListener('click', function() {
    var notificaciones = document.getElementById("notificaciones");
    notificaciones.innerHTML = "";
    document.getElementsByClassName("contador")[0].innerHTML = 0;
    fetch('http://localhost/controladores/notificationsDelete.php').then(function(response) {
        if(!response.ok) { // Si la promise nos devuelvo falso quiere decir que algo salio mal
            throw new Exception("Error");
        }
    }).catch(function(error) {
        alert("Error: " + error);
    });
});

mostarNombre();
function mostarNombre() {
    var nombre = localStorage.getItem('DatosUsuario');
    var bienvenida = document.getElementsByClassName("bin");
    bienvenida[0].innerHTML = "<p>Bienvenido " + nombre+ "</p>";
}

function quitarNombre() {
    var nombre = document.getElementsByClassName("bin");
    nombre[0].innerHTML = "";
}

setInterval(function() {
    quitarNombre();
}, 5000);