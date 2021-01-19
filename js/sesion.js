window.onload = function (params) {
    var usuario = document.getElementById("usuario");//recuperando elemento de html
    fetch("../php/recupera_usuario.php")//recuperando el usuario de la sesion 
        .then(respuesta => respuesta.json())
        .then(function (datosRespuesta) {
            var nombre = datosRespuesta;

            document.getElementById("alias_usuario").innerHTML = nombre;
        });



var fperfil=document.getElementById("usuario");//recuperando elemento de html
    fetch("../php/recupera_fotou.php")//recuperando el usuario de la sesion 
        .then(resp => resp.json())
        .then(function (fotoRespuesta) {
            var fotito = fotoRespuesta;

 document.getElementById("foto_p").src=fotito;
  });
 /*
            if (empty(fotito)) {
                 document.getElementById("foto_p").src=fotito;
                
            }else{
               document.getElementById("foto_p").src="../css/img/usuario.svg";
        
            }*/

           


    }

    