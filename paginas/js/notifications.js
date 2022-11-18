/**/

fetch('http://localhost/controladores/notifications.php').then(function(response) {
    if(!response.ok) {
        throw new Exception("Error");
    }
        return response.text();
    }).then(function(text) {
        document.getElementsByClassName("badge")[0].innerHTML = JSON.parse(text).length;
        jsonNot = JSON.parse(text);
        for(let i = 0; i < jsonNot.length; i++) {
            var element = document.createElement("div");
            element.classList.add('msg');
            element.appendChild(document.createTextNode(jsonNot[i].empleado_numEmple));
            document.getElementById('box').appendChild(element);
        }
        //document.body.appendChild(element);
        //alert(jsonNot[0].empleado_numEmple);
    }).catch(function(error) {
        alert(error);
    });

//document.getElementsByClassName("badge")[0].innerHTML = Object.keys(jsonNot).length;

document.getElementById("botonNotificaciones").addEventListener('click', function() {
    document.getElementById("botonNotificaciones").classList.toggle("activo");
});