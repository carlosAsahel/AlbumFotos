<?php
$bd_host="localhost";
$bd_nombre="album_fotografico";
$bd_usuario="root";
$bd_contrasena="";

$conexion=mysqli_connect($bd_host,$bd_usuario,$bd_contrasena,$bd_nombre);//conexion con bd
if(mysqli_connect_errno()){//en caso de fallar la conexion de ejecuta el if 
    echo "error al conectar con la base de datos";
}

mysqli_set_charset($conexion,"utf8");//reconocer caracteres latinos

function insertar($valores,$tabla_bd,$campos){
     global $conexion;
    $insercion="insert into $tabla_bd($campos) values($valores)";
    $resultado=mysqli_query($conexion,$insercion);
    if($resultado==false){
        echo "error al insertarlo";
    }else{
        echo "insercion correcta";
    }  
}


function eliminar($condicion,$tabla_bd){
     global $conexion;
    $eliminacion="delete from $tabla_bd where $condicion ";
     $resultado=mysqli_query($conexion,$eliminacion);
    if($resultado==false){
        echo "error al eliminarlo";
    }else{
        echo "se elimino el registro";
    }
}

function actualizar($tabla_bd,$campo,$valor,$condicion){
       global $conexion;
     $actualizar="update $tabla_bd set $campo=$valor where $condicion";
     $resultado=mysqli_query($conexion,$actualizar);
    if($resultado==false){
        echo "error al actualizarlo";
    }else{
        echo "campo actualizado";
    }
}

function leer($valor="*",$tabla_bd="galeria"){
    global $conexion;
    $tabla;
    $fila;
    $consulta="select $valor from $tabla_bd";
    $resultado=mysqli_query($conexion,$consulta);
    if($resultado==false){
        echo "error al consultarlo";
    }else{
        echo "consulta correcta"."<br>";
    }
    $cont_fila=0;
    while($fila=mysqli_fetch_array($resultado, MYSQLI_ASSOC)){
    $tabla[$cont_fila][0]=$fila['nombre'];   
    $tabla[$cont_fila][1]=$fila['ruta'];
    $tabla[$cont_fila][2]=$fila['categoria'];
    $tabla[$cont_fila][3]=$fila['fecha']; 
    $cont_fila++;
    }
    return $tabla;
}
function LeerConCondicion($valor="*",$tabla_bd="galeria",$condicion){
       global $conexion;
    $tabla2;
    $fila;
    $consulta="select $valor from $tabla_bd where $condicion";
    
    $resultado=mysqli_query($conexion,$consulta);
    if($resultado==false){
        echo "error al consultarlo";
    }else{
        //echo "consulta correcta"."<br>";
    }
    $cont_fila=0;
    while($fila=mysqli_fetch_array($resultado, MYSQLI_ASSOC)){
    $tabla2[$cont_fila][0]=$fila['id'];   
    $tabla2[$cont_fila][1]=$fila['id_album'];
    $tabla2[$cont_fila][2]=$fila['direccion'];
    $tabla2[$cont_fila][3]=$fila['fecha_publicacion']; 
    $cont_fila++;
    }
    return $tabla2;
}
function LeerConCondicion2($valor="*",$tabla_bd="galeria",$condicion){
    global $conexion;
 $tabla2;
 $fila;
 $consulta="select $valor from $tabla_bd where $condicion";
 
 $resultado=mysqli_query($conexion,$consulta);
 if($resultado==false){
     echo "error al consultarlo";
 }else{
     //echo "consulta correcta"."<br>";
 }
 $cont_fila=0;
 while($fila=mysqli_fetch_array($resultado, MYSQLI_ASSOC)){
 $tabla2[$cont_fila][0]=$fila['id'];   
 $tabla2[$cont_fila][1]=$fila['id_usuario'];
 $tabla2[$cont_fila][2]=$fila['nombre'];
 $tabla2[$cont_fila][3]=$fila['descripcion']; 
 $cont_fila++;
 }
 return $tabla2;
}
?>