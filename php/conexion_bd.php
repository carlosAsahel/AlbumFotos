<?php
$host="localhost";
$user="root";
$psw="";
$db="album_fotografico";

$con = new mysqli($host,$user,$psw,$db);

if(!$con){
    die("La conexion fallo: ". mysqli_connect_error());
}
else{
    mysqli_query($con,"SET NAMES 'UTF8'");
    
}
?>
