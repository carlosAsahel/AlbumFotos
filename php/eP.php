
<?php
session_start();
$nom=$_FILES['imagen']['name'];
$img=$_FILES['imagen']['tmp_name'];
include ("conexion_bd.php");



$id_u=$_POST['id'];
//echo $id_u;
$nombre=$_POST['nombre'];
$ape_p=$_POST['ape_p'];
$ape_m=$_POST['ape_m'];
$alias=$_POST['alias'];
$correo=$_POST['correo'];
$password=$_POST['password'];


$pswhas= password_hash($password, PASSWORD_DEFAULT);


$ruta="../img";

echo $_SESSION["foto"];;
if (!isset($nom)) {
	$ruta=$_SESSION["foto"];
}else{
	$ruta=$ruta."/".$nom;
}

move_uploaded_file($img,$ruta);



//$sq = "UPDATE  albumes_compartidos  SET permisos ='$permiso' WHERE id_usuario='$id_u' AND id_album=".$id_a;
$sql = "UPDATE usuarios SET nombre='".$nombre."',apellido_pat='".$ape_p."',apellido_mat='".$ape_m."',alias='".$alias."',correo='".$correo."',
password='".$pswhas."', ruta='".$ruta."' WHERE id='".$id_u."'";
 

        if ($con->query($sql) === TRUE) {
			print "<script>alert(\"Se actualizo con exito, Reiniciar la sesion...\");window.location='../php/salir.php';</script>";
	
    } else {
      echo "Error: " . $sql . "<br>" . $con->error;
    }



?>