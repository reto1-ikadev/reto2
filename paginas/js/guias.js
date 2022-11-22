document.getElementById('nGuia').addEventListener('click', nuevaVentana);

function nuevaVentana() {
    window.open("../controladores/subirGuia.php", 'Nueva pregunta', 'width=900,height=800');
};







recibirDatos().then(function (data) {
    buscarArchivos(data);
    console.log(data);

});


async function buscarArchivos(datos) {
    console.log(datos.guia[0].id);
    let main = document.getElementById('main');
    for (let i = 0; i < datos.guia.length; i++) {
        cargarArchivos(datos.guia[i].idArchivo).then(function (data) {
            let div = document.createElement('div');
            div.classList.add('guia');
            div.innerHTML = "<span><b>Titulo: </b>" + datos.guia[i].contenido + "</span><br>" + 
            "<a href='"+ data.archivo[0].ruta + "' download='"+ data.archivo[0].nombre +"'>Descargar</a>";
            main.appendChild(div);
          
        });
      }
}



async function recibirDatos() {
    let response = await fetch('/controladores/cargarGuias.php',
        {
            method: 'GET'

        });
    let result = await response.json();
    return result;
}

async function cargarArchivos(guia) {
    let response = await fetch('/controladores/cargarArchivos.php?id=' + guia,
    {
        method: 'GET'

    });
let result = await response.json();
return result;

}
