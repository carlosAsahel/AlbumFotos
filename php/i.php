<?php
include ("conexion_bd.php");
$usuario= $_POST['correo'];
$password=$_POST['password'];

if (isset($usuario)) {
 
	
	session_start();
 
	$sql= "SELECT * FROM usuarios WHERE correo ='".$usuario."'";

	$resultado= mysqli_query($con,$sql);
	$fila=mysqli_fetch_array($resultado);
 
 
	if (password_verify($password,$fila['password'])){
 
		$_SESSION['id']=$fila['id'];
		$_SESSION['alias']=$fila['alias'];
		$_SESSION['foto']=$fila['ruta'];
		$_SESSION["loggedin"] = true;
		
		header("location:../vistas/mis_albumes.html");
	}
	else{
		print "<script>alert(\"Error en tus credenciales\");window.location='../vistas/ingresar.php';</script>";
	}
}
else{
	header("location:../vistas/ingresar.php");
}
?>