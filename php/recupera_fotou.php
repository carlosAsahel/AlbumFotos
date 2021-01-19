<?php
session_start();
$id_usuario=$_SESSION['id'] ;
$alias=$_SESSION['alias'];
$foto=$_SESSION['foto'];
echo json_encode($foto);
?>