
<?php 
include ("conexion_bd.php");

 $id_a=$_GET['id_a'];
 $nombre=$_GET['nombre'];

if (isset($_GET['id'])){
	
	$id=intval($_GET['id']); 
	
	$sq = "DELETE FROM albumes_compartidos WHERE id_usuario='$id'";
	$res = $con->query($sq);
	if($res!=null){
		print "<script>alert(\"Usuario eliminado exitosamente.\");</script>";
		
		header("location:../vistas/agregar_albumc.php?nombre=".$nombre."&id_album=".$id_a);
	}else{
		print "<script>alert(\"No se pudo eliminar el Usuario.\");</script>";

		header("location:../vistas/agregar_albumc.php?nombre=".$nombre."&id_album=".$id_a);

	}
}
?>