if(confirm("¿ Acepta el almacenamiento y uso de cookies en su navegador ?")) {
    var dias = 60;
    const d = new Date();
    d.setTime(d.getTime() + (dias * 24 * 60 * 60 * 1000));
    document.cookie = "acceptCookies=acepta; expires=" + d.toUTCString() + "; path=/";
}