var permisos;
window.onload=function (e) {
    var usuario=document.querySelector("#Usuario h5");//recuperando elemento de html
    fetch("../php/recupera_usuario.php")//recuperando el usuario de la sesion 
    .then(respuesta => respuesta.json())
    .then(function(datosRespuesta) {
        var alias=datosRespuesta;
    usuario.innerHTML=alias;//agregando texto al elemento html
    });
  
    fetch("../php/recupera_fotou.php")//recuperando el usuario de la sesion 
        .then(resp => resp.json())
        .then(function (fotoRespuesta) {
            var fotito = fotoRespuesta;

 document.getElementById("foto_p").src=fotito;
  });

    var reg = new RegExp( '[?&]' + "id_album" + '=([^&#]*)', 'i' );
    var reg2 = new RegExp( '[?&]' + "permisos" + '=([^&#]*)', 'i' );
    var string = reg.exec(window.location.href);
    var string2 = reg2.exec(window.location.href);
    var id_album=string ? string[1] : undefined;
        permisos=string2 ? string2[1] : undefined;
        console.log(id_album+" "+permisos);
    if (permisos==1 || permisos==3) {
        var agregarFotos=document.querySelector("#menu li:nth-child(2) a");
        agregarFotos.setAttribute("href","agregarFotos.html?id_album="+id_album);
    } else {
       var menu=document.querySelector("#menu ul");
       var agregarFotos=document.querySelector("#menu li:nth-child(2)");
       menu.removeChild(agregarFotos);
    }
 

    fetch("../php/recuperaNombreAlbum.php",{
        method: 'POST',
        headers:{
            'Content-Type': 'application/json'
        },
        body: JSON.stringify({idAlbum:id_album})  
   })//recuperando el nombre del album 
    .then(respuesta => respuesta.json())
    .then(function(datosRespuesta) {
        nombreAlbum=document.querySelector("#Titulo h1")
       nombreAlbum.innerHTML= ""+datosRespuesta[0][2];
      
    });

    fetch("../php/recuperacionImagenes.php"
    ,{
        method: 'POST',
        headers:{
            'Content-Type': 'application/json'
        },
        body: JSON.stringify({idAlbum:id_album})  
   }
   )
    .then(respuesta => respuesta.json())
    .catch(error => console.error('Error:', error))
    .then(function(datosRespuesta) {
     recuperaImagenes(datosRespuesta);
    });
}

function recuperaImagenes(matrizResultado){
          var contenedor=document.querySelector("#Imagenes");
    for(let i=0;i<matrizResultado.length;i++){
        let temporal;
    
    temporal= new URL(matrizResultado[i][2]);//let es para limitar el alcance de la variable
   
      var figure=document.createElement('figure');
      var imagen=document.createElement('img');
          imagen.setAttribute("src",""+temporal);
          figure.setAttribute("id",""+matrizResultado[i][0]);
      var boton=document.createElement("button");
      var imagen2=document.createElement("img");
          imagen2.setAttribute("src","../css/img/x.png");
          boton.append(imagen2);
          if (permisos==2 || permisos==3) {
            figure.append(imagen,boton);
            boton.addEventListener("click", function (params) {
                eliminar(matrizResultado[i]);
            });
          } else {
            figure.append(imagen);
          }
        
          contenedor.append(figure);
        
     
    }
}

function eliminar(datos) {
    console.log(datos);
var respuesta=confirm("la imagen se borrara de forma permanente \n ¿Desea eliminarla?");
if (respuesta==true) {
    var contenedor=document.querySelector("#Imagenes");
    var imagen=document.getElementById(""+datos[0]);
    contenedor.removeChild(imagen);
    fetch("../php/eliminaImg.php?id="+datos[0])
    .then(respuesta => respuesta.text())
    .then(function(datosRespuesta) {
       console.log(datosRespuesta);
    });
}

   
    
}
