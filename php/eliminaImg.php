<?php
require_once("conexion_bdFull.php");
$idImg=$_GET['id'];

$condicional=" id = $idImg";
$matImagenes=leerConCondicion("*","fotos",$condicional);
unlink($matImagenes[0][2]);//ruta de cada imagen y su eliminacion

$tabla="fotos";
eliminar($condicional,$tabla);

?>