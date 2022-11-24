if(confirm("¿ Acepta el almacenamiento y uso de cookies en su navegador ?")) {
    var dias = 60;
    const d = new Date();
    d.setTime(d.getTime() + (dias * 24 * 60 * 60 * 1000));
    document.cookie = "acceptCookies=acepta; expires=" + d.toUTCString() + "; path=/";
    getNombre();
}
//fetch para obtener nombre y apellidos del usuario
async function getNombre() {
    let response = await fetch('/controladores/getNombre.php');
    let result = await response.json();
    if (result.nombre != null) {
        nombre = result.nombre + " " + result.apellidos;
        localStorage.setItem('DatosUsuario', nombre);
        console.log(nombre);
    }
}
