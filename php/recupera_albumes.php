<?php
session_start();
$usuario = $_SESSION['id'];
$bd_host = "localhost";
$bd_nombre = "album_fotografico";
$bd_usuario = "root";
$bd_contrasena = "";
$respuesta = "incorrecto";
$conexion = mysqli_connect($bd_host, $bd_usuario, $bd_contrasena, $bd_nombre); //conexion con bd
if (mysqli_connect_errno()) {
    //echo "error al conectar con la base de datos";
}

$tabla_bd = "album";
$fila;
$valor = "*";

$consulta = "Select  id, nombre from album where id_usuario=$usuario";
$resultado = mysqli_query($conexion, $consulta);
if ($resultado == false) {
  //  echo "error al consultarlo";
} else {
    //echo "consulta correcta"."<br>";
    $cont_fila = 0;
    $tabla;
    $id_album;
    while ($fila = mysqli_fetch_array($resultado, MYSQLI_ASSOC)) {
        $tabla[$cont_fila][1] = $fila['nombre'];
        $tabla[$cont_fila][2] = $fila['id'];
        $id_album[$cont_fila] = $fila['id'];
        $cont_fila++;
    }
}
 $i=0;
for ($i=0;$i<$cont_fila;$i++){
    $consulta = "Select  direccion from fotos where id_album= $id_album[$i] limit 1";
    $resultado = mysqli_query($conexion, $consulta);
    if ($resultado == false) {
    } else {
        //echo "consulta correcta"."<br>";    
        while ($fila = mysqli_fetch_array($resultado, MYSQLI_ASSOC)) {
            $tabla[$i][3] = $fila['direccion'];
        }

       
}
}

echo json_encode($tabla);
mysqli_close($conexion);
