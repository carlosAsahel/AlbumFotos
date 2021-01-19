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
    fetch("../php/recupera_albumes.php", { method: 'POST' })//recuperando tabla de base de datos 
        .then(respuesta => respuesta.json())
        .then(muestra_galeria)
        .catch(function (error) {
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
        for (let j = 1; j < 4; j++) {
            if (j == 1) {
                contenido += "<p> <a href=dentroAlbum.html?id_album=" + datos[i][2] + "&permisos=3>" + datos[i][j] + "</a> <img onclick='editar(" + datos[i][2] + ")' style='width:3vh' src='../css/img/editar_a.png'> <img onclick='eliminar(" + datos[i][2] + ")' style='width:3vh' src='../css/img/eliminar.png'></p> ";
            } else if (j == 3) {
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


function editar(datos) {

    var nombre = prompt("introduce el nuevo nombre del album", "");

     
    if (nombre !="") {
        
        var fr = new FormData();
        fr.append("id", datos);
        fetch("../php/editar_album.php?id_album=" + datos + "&nombre=" + nombre, {
            method: 'POST',
            body: fr
        }).then(function (resultado) {
            location.reload();
        });

    }else{
        alert("Error en cambiar nombre, campo vacío");
    }
}
function eliminar(datos) {
    var respuesta = confirm("Decea borrar el album, se borraran todas las fotos que contiene\n Las personas a las que le compartiste el album dejaran de verlas \n ¿Desea eliminarlo?");
    if (respuesta == true) {
    var fr = new FormData();
    fr.append("id", datos);
    fetch("../php/eliminar_album.php", {
        method: 'POST',
        body: fr
    }).then(function (resultado) {
        location.reload();
    });
    }
}