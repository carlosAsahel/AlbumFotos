<?php
require_once("conexion_bdFull.php");
$respuesta = json_decode(file_get_contents('php://input'),true);
$id_album=$respuesta['idAlbum'];
$valor=" * ";
$tabla=" album ";
$condicion=" id = $id_album";

$matrizResultado=LeerConCondicion2($valor,$tabla,$condicion);

$json=json_encode($matrizResultado);
echo $json;

?>