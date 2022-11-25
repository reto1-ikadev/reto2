
 const validar = {
    validarCorreo: function(correo){
            
        var expRegCorreo = new RegExp(
            /[a-zA-Z0-9_]+([.][a-zA-Z0-9_]+)*@[a-zA-Z0-9_]+([.][a-zA-Z0-9_]+)*[.][a-zA-Z]{2,5}/
        );

            if(correo == "" || !expRegCorreo.test(correo) ){
                return 2;
            }
            else{
                return 1; 
            }
    }
 }


   module.exports = validar