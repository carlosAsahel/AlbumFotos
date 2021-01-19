var arregloImg=[],arregloFormularios=[];
var temporal;
 var formdata= new FormData();
var contador=0,contadorfiles=0;
$(document).ready(function(){
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
 
    $("#explorador").change(function(){
        var error=false;
        var mensajeError="";
  for (let i= 0; i < this.files.length; i++) {
    console.log(this.files[i].type);
    if (this.files[i].type !="image/png" && this.files[i].type !="image/jpeg") {
        mensajeError+="El archivo "+this.files[i].name+" no es una imagen\n";
        error=true;
    }
      
    }

    if (error==false) {
        previaImg(this);  
    }else{
        alert(mensajeError+"Seleccione unicamente imagenes");
    }     
    });
    $("#formulario").submit(enviarImagen);
 
});

function enviarImagen(e){
    e.preventDefault();
    var reg = new RegExp( '[?&]' + "id_album" + '=([^&#]*)', 'i' );
    var string = reg.exec(window.location.href);
    var id_album=string ? string[1] : undefined;
      var categoria=id_album;//recuperar id del album
    
    for(var i=0;i<arregloImg.length;i++){
        //modifico el valor de categoria con el ultimo valor seleccionado 
        arregloImg[i].setCategoria(categoria);
    }
    var datos={imagenes:arregloImg
              };
    
    $.post("../php/subirImgBaseDatos.php",datos,respuestaServidor); 
    $.ajax({
        url:"../php/subirImgServidor.php",
        type:"post",
        data:formdata,
        contentType:false,
        processData:false,
        success: function(dato){
            //alert(dato);
             location.reload();//recargo la pagina 
        }
        
    });
   
     return false;
}

function respuestaServidor(datosRespuesta){
    //alert(datosRespuesta);
}

function eliminaImagen(e){
    $(this).remove();//elimino el contenedor 
var objRespuesta= arregloImg.find(elemento => elemento.getNombre() == $(this).attr("name"));//recupero el objeto que se va a eliminar
 var indice=arregloImg.indexOf(objRespuesta);//obtengo el indice del objeto
arregloImg.splice(indice,1);//elimino el objeto del arreglo
formdata.delete("imagen"+indice);//elimino el file de formdata con la clave  
}

function previaImg(entrada){
   contadorfiles=0;
    if(entrada.files && entrada.files[0]){
       var lector = new FileReader();
      
       lector.onload=function(e){//e es el archivo que se va a cargar
         
          temporal=e.target.result;
           $("#vistaPrevia").append("<figure class='imagenes' name='"+entrada.files[contadorfiles].name+"'> <div class='eliminar'><img src='../css/img/x.png'></div><img  src='"+temporal+"'><figcaption> "+entrada.files[contadorfiles].name+" </figcaption></figure>");
        
           $(".imagenes[name='"+entrada.files[contadorfiles].name+"']").click(eliminaImagen);
           if(contadorfiles<(entrada.files.length-1)){//condicion para salir de recursividad
              contadorfiles++;
             lector.readAsDataURL(entrada.files[contadorfiles]);
              }
           
       };   
        
        //se carga el file correpondiente dentro del arreglo de files y se llama a onload
        lector.readAsDataURL(entrada.files[contadorfiles]);
        for (var i=0;i<entrada.files.length;i++){
        var rutaTemporal = URL.createObjectURL(entrada.files[i]);
        var categoria=$("#categoria").val();
        var objetoImagen=new Imagen(entrada.files[i].name,rutaTemporal,categoria);
        //agregar los objetos a el arreglo de objetos
        arregloImg.push(objetoImagen); 
        console.log(arregloImg); //imprimir el arreglo
        //agregar el file al formulario 
        formdata.append(entrada.name+contador,entrada.files[i],entrada.files[i].name);
        contador++;   
        }
        
     
    
    
    }else{
           alert("no encontro archivo"); 
       }
    
      
}