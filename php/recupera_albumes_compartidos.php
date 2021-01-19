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

$consulta ="select ac.id_album, ac.permisos, a.nombre,a.id_usuario
 from albumes_compartidos ac inner join  album a
on ac.id_album=a.id and ac.id_usuario=$usuario;";
$resultado = mysqli_query($conexion, $consulta);
if ($resultado == false) {
    //  echo "error al consultarlo";
} else {
    //echo "consulta correcta"."<br>";
    $cont_fila = 0;
    $tabla;
    $id_album;
    $id_usuario;
    while ($fila = mysqli_fetch_array($resultado, MYSQLI_ASSOC)) {
        $tabla[$cont_fila][1] = $fila["id_album"];
        $tabla[$cont_fila][2] = $fila["permisos"];
        $tabla[$cont_fila][3] = $fila["nombre"];
        $id_album[$cont_fila]= $fila["id_album"];
        $id_usuario[$cont_fila] = $fila["id_usuario"];
        $cont_fila++;
    }
}
$i = 0;
for ($i = 0; $i < $cont_fila; $i++) {
    $consulta = "Select  direccion from fotos where id_album= $id_album[$i] limit 1";
    $resultado = mysqli_query($conexion, $consulta);
    if ($resultado == false) {
    } else {
        //echo "consulta correcta"."<br>";    
        while ($fila = mysqli_fetch_array($resultado, MYSQLI_ASSOC)) {
            $tabla[$i][4] = $fila['direccion'];
        }
    }
}
$i = 0;
for ($i = 0; $i < $cont_fila; $i++) {
    $consulta = "Select  nombre from usuarios where id= $id_usuario[$i] ";
    $resultado = mysqli_query($conexion, $consulta);
    if ($resultado == false) {
    } else {
        //echo "consulta correcta"."<br>";    
        while ($fila = mysqli_fetch_array($resultado, MYSQLI_ASSOC)) {
            $tabla[$i][5] = $fila['nombre'];
        }
    }
}
echo json_encode($tabla);
mysqli_close($conexion);
