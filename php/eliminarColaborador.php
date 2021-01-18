
<?php 
include ("conexion_bd.php");
$id_a=$_GET['id_a'];
$nombre=$_GET['nombre'];

if (isset($_GET['id'])){
	
	$id=intval($_GET['id']);
	
	$sq = "DELETE FROM albumes_compartidos WHERE id_usuario='$id'";
	$res = $con->query($sq);
	if($res!=null){

		
		echo "<script>alert('Usuario eliminado del álbum');
  window.location='../php/modificarPrivilegios.php?nombre=".$nombre."&id_album=".$id_a."';</script>";
	}else{
		print "<script>alert(\"No se pudo eliminar el Usuario.\");</script>";

		header("location:../php/modificarPrivilegios.php?nombre=".$nombre."&id_album=".$id_a);

	}
}
?>