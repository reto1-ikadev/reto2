/**/



fetch('http://localhost/controladores/notifications.php').then(function(response) {
    if(!response.ok) {
        throw new Exception("Error");
    }
        return response.text();
    }).then(function(text) {
        document.getElementsByClassName("badge")[0].innerHTML = JSON.parse(text).length;
    }).catch(function(error) {
        alert(error);
    });

//document.getElementsByClassName("badge")[0].innerHTML = Object.keys(jsonNot).length;

document.getElementById("botonNotificaciones").addEventListener('click', function() {
    fetch('http://localhost/controladores/notifications.php').then(function(response) {
    if(!response.ok) {
        throw new Exception("Error");
    }
        return response.text();
    }).then(function(text) {
        jsonNot = JSON.parse(text);
        alert(jsonNot[0].empleado_numEmple);
    }).catch(function(error) {
        alert(error);
    });
});