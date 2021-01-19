<?php
// Inicializar sesion 
session_start();
 
$_SESSION = array();
 
//Destruir la sesion 
session_destroy();
 
// Redirigirse a la pagina ingresar 
header("location: ../vistas/ingresar.php");
exit;
?>