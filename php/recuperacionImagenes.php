<?php
require_once("conexion_bdFull.php");

$respuesta = json_decode(file_get_contents('php://input'),true);
$id_album=$respuesta['idAlbum'];
$valor=" * ";
$tabla=" fotos ";
$condicion="id_album= $id_album";
$matrizResultado=LeerConCondicion($valor,$tabla,$condicion);
$matriz2=array();
for($i=0;$i<sizeof($matrizResultado);$i++){
    global $matrizResultado,$matriz2;
    // Cargando la imagen
$data = file_get_contents($matrizResultado[$i][2]);
    // Extensión de la imagen
$type = pathinfo($matrizResultado[$i][2], PATHINFO_EXTENSION);
    // Decodificando la imagen en base64
$base64 = 'data:image/' . $type . ';base64,' . base64_encode($data);
  $matrizResultado[$i][2]=$base64;
}

$json=json_encode($matrizResultado);
echo $json;
?>