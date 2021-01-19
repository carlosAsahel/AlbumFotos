<?php

require_once("conexion_bdFull.php");
$arreglo=$_POST["imagenes"];//recupero el literal del arreglo de objetos
$id_album=$_POST["imagenes"][0]["categoria"];
$nombreImagen;
$carpetaDestino='../img/';//carpeta destino de imagenes


foreach($arreglo as $indice){//recorre el indice del arreglo de objetos
  foreach($indice as $clave => $valor){//los objetos se convirtieron en un array asociativo
    if($clave =="categoria"){
        global $categoria;
            $id_album=$valor;
    
    }else if($clave == "nombre"){
        global $nombreImagen;
           $nombreImagen=$valor;
       
    } 
    }
    global $nombreImagen,$id_album,$carpetaDestino;
      $tabla_bd=" fotos ";
      $valores="'$id_album','$carpetaDestino$nombreImagen','".date('Y-m-d')."'";
      $campos_bd="id_album,direccion,fecha_publicacion"; 
   insertar($valores,$tabla_bd,$campos_bd);
    echo "  valores= $valores  ";
    
}

mysqli_close($conexion);

?>