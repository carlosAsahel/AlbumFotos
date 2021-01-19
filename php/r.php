
<?php
include ("conexion_bd.php");
$nom=$_FILES['imagen']['name'];
$img=$_FILES['imagen']['tmp_name'];

$nombre=$_POST['nombre'];
$ape_p=$_POST['ape_p'];
$ape_m=$_POST['ape_m'];
$alias=$_POST['alias'];
$correo=$_POST['correo'];
$password=$_POST['password'];

//VERIFICAR CORREO
$sql= "SELECT * FROM usuarios WHERE correo ='".$correo."'";

	$resultado= mysqli_query($con,$sql);
	$fila=mysqli_fetch_array($resultado);


if ($fila['correo']==$correo){

 		print "<script>alert(\"Ya existe un usuario con ese correo\");window.location='../vistas/registro.php';</script>";
	}else{



//VERIFICAR ALIAS

	$sql= "SELECT * FROM usuarios WHERE alias ='".$alias."'";

	$resultado= mysqli_query($con,$sql);
	$fila=mysqli_fetch_array($resultado);

	if ($fila['alias']==$alias){
 		print "<script>alert(\"Ya existe un usuario con ese alias\");window.location='../vistas/registro.php';</script>";
	}else{


//Cargar Imagen 
$pswhas= password_hash($password, PASSWORD_DEFAULT);
$ruta="../img";
if (!isset($nom)) {
	$ruta="../css/img/usuario.svg";
}else{
	$ruta=$ruta."/".$nom;
}

move_uploaded_file($img,$ruta);
echo "la ruta es: ".$ruta;
//Fin de carga de imagen



$sql = "INSERT INTO usuarios (nombre,apellido_pat,apellido_mat,alias,correo,password,ruta)
  VALUES ('".$nombre."','".$ape_p."','".$ape_m."','".$alias."','".$correo."','".$pswhas."','".$ruta."')";
 

        if ($con->query($sql) === TRUE) {
			print "<script>alert(\"Bienvenido ya eres un nuevo usuario\");window.location='../vistas/ingresar.php';</script>";
			
    } else {
      echo "Error: " . $sql . "<br>" . $con->error;
    }
}
}

?>