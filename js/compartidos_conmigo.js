window.onload = function (params) {
    var usuario = document.getElementById("usuario");//recuperando elemento de html
    fetch("../php/recupera_usuario.php")//recuperando el usuario de la sesion 
        .then(respuesta => respuesta.json())
        .then(function (datosRespuesta) {
            var nombre = datosRespuesta;

            document.getElementById("alias_usuario").innerHTML = nombre;
        });

    fperfil = document.getElementById("usuario");//recuperando elemento de html
    fetch("../php/recupera_fotou.php")//recuperando el usuario de la sesion 
        .then(resp => resp.json())
        .then(function (fotoRespuesta) {
            var fotito = fotoRespuesta;

            document.getElementById("foto_p").src = fotito;
        });
    fetch("../php/recupera_albumes_compartidos.php", { method: 'POST' })//recuperando tabla de base de datos 
        .then(respuesta => respuesta.json())
        .then(muestra_galeria)
        .catch(function (error) {
        });

   var fperfil=document.getElementById("usuario");//recuperando elemento de html
    fetch("../php/recupera_fotou.php")//recuperando el usuario de la sesion 
        .then(resp => resp.json())
        .then(function (fotoRespuesta) {
            var fotito = fotoRespuesta;

 document.getElementById("foto_p").src=fotito;
  });


}
function salir(evnt) {
    location.href = "ingresar.php";
}

function muestra_galeria(datos) {
    var galeria = document.getElementById("galeria");
    contenido = "";
    galeria.innerHTML = "";
    for (let i = 0; i < datos.length; i++) {
        contenido += "<div>";
        for (let j = 1; j < 6; j++) {
            if (j == 1) {
                contenido += "<article> <a href=dentroAlbum.html?id_album=" + datos[i][1] + "&permisos=" + datos[i][2] + "><i>" + datos[i][3] + "</i></a><p> Creador: " + datos[i][5]+"</p></article> ";
            } else if (j == 4) {
                
                if (datos[i][j] == null) {
                    contenido += "<img src=../css/img/album_default.jpg>";
                } else {
                    contenido += "<img src=" + datos[i][j] + ">";

                }

            }
        }
        
        contenido += "</div>";
    }
    galeria.innerHTML = contenido;
}



function eliminar(datos) {
    var fr = new FormData();
    fr.append("id", datos);
    fetch("../php/eliminar_album.php", {
        method: 'POST',
        body: fr
    }).then(function (resultado) {
        ;
    });

    
}