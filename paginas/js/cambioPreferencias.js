function cambiarPreferencias(preferencias) {
    console.log(preferencias[0]);
    document.querySelector("body").style.fontFamily = preferencias[0];
    document.querySelector("body").style.color = preferencias[1];
  
  }
  function obtenerCookie() {
    var cooks = document.cookie;
    console.log(cooks);
    let arrayCookies = cooks.split(";");
    console.log(arrayCookies);
    var expRegPref = new RegExp("preferencias");
    for (var cook of arrayCookies) {
      if (expRegPref.test(cook)) {
        var cookPref = cook;
        console.log(cook);
      }
    }
      var prueba = cookPref.split("=");
      var guardarPreferecias = prueba[1];
      var preferencias = guardarPreferecias.split(",");
      cambiarPreferencias(preferencias);
      
  }
  obtenerCookie();