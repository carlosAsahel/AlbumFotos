<?php
//recorrer el arreglo de files para obtener todas las imagenes
foreach($_FILES as $clave =>$valor){
//la clave tiene el nombre del file y con ella accedo a los datos de cada imagen
$nombreImagen=$_FILES[$clave]['name'];
$temporalImagen=$_FILES[$clave]['tmp_name']; 
$carpetaDestino='../img/';
//moviendo imagen al servidor mediante la ruta  temporal
move_uploaded_file($temporalImagen,$carpetaDestino.$nombreImagen);
    echo"se subio $nombreImagen";
}


?>