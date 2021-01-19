<?php
// Inicializar sesión
session_start();
 
// Chequeo de un usuario logeado

$id=$_SESSION["id"];
include ("../php/conexion_bd.php");
$sql1= "select * from usuarios WHERE id=".$id;
$query = $con->query($sql1);
$r=$query->fetch_array()
?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Perfil </title>
     <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  
    <link rel="stylesheet" href="../css/header2.css">
    <link rel="stylesheet" href="../css/style.css">

</head>
<style type="text/css">
  #id_u{
    display: hidden; 

  }
</style>
<body>
     <header>
        <div id="logo">

            <img src="../css/img/logo.png" alt="LOGO">

            <h6><b>Álbum Familiar</b></h6>
        </div>

        <div id="Titulo">
            <h2>Perfil</h2>
        </div>

        <div id="Usuario">
            <img src="../css/img/usuario.svg" alt="Foto perfil" id="foto_p"> 
            <h6  id="alias_usuario">Usuario</h6>
            <label for="btn_opciones"><img src="../css/img/editar.png" alt="Opciones"></label>
            <input type="checkbox" name="btn_opciones" id="btn_opciones">
            <ul id="opciones">
                 <li><a href="../php/perfil.php"> Perfil</a></li>
                <li> <a href="../php/salir.php"> Salir</a> </li>
       
       
              </ul>
        </div>


        <input type="checkbox" name="btn_menu" id="btn_menu">
        <section id="menu">
          <ul>
                <li> <a href="../vistas/mis_albumes.html" > Mis álbumes </a></li>
                <li> <a href="../vistas/agregar_album.php">Nuevo álbum</a> </li>
                <li> <a href="../vistas/compartidos_conmigo.html">Compartidos conmigo</a></li>
                <li> <a href="../php/buscar_album.php">Buscar álbum</a></li>
          </ul>
          <label for="btn_menu"><img src="../css/img/flecha.png" alt="Flecha"></label>
         
    
        </section>
    </header>
    <br><br><br><br>
<div class="formulario_reg">
<div  class="container pt-4" style=" padding: auto">

    <form action="../php/eP.php" method="post"  enctype="multipart/form-data" class="validated">
    <div class="form-group" style="text-align: center">
              <br><br>
              <img id="imagenPrevisualizacion" src="<?php echo $r['ruta'];?>" width="200" height="100">
              <br><br>
              <input type="file" name="imagen" id="seleccionArchivos"  accept="image/*" required>
              <script src="../js/prevImg.js"></script>
              <br>
    </div>
    <div class="form-group">
    <input type="text" hidden="true" class="form-control"  name="id" placeholder="id" value="<?php echo $r['id']?>" required>
    </div>
    <div class="form-group">
      <label for="">Ingresa tu nombre(s)</label>
      <input type="text" class="form-control" name="nombre" placeholder="Nombre(s)" value="<?php echo $r['nombre']?>" required pattern="^[a-zA-ZàáâäãåąčćęèéêëėįìíîïłńòóôöõøùúûüųūÿýżźñçčšžÀÁÂÄÃÅĄĆČĖĘÈÉÊËÌÍÎÏĮŁŃÒÓÔÖÕØÙÚÛÜŲŪŸÝŻŹÑßÇŒÆČŠŽ∂ð /s]{2,64}" title="Solo letras. Ejemplo: José">
    </div>
    <div class="form-group">
      <label for="">Apellido Paterno</label>
      <input type="text"  class="form-control" name="ape_p" placeholder="Apellido Paterno" value="<?php echo $r['apellido_pat']?>" required pattern="^[a-zA-ZàáâäãåąčćęèéêëėįìíîïłńòóôöõøùúûüųūÿýżźñçčšžÀÁÂÄÃÅĄĆČĖĘÈÉÊËÌÍÎÏĮŁŃÒÓÔÖÕØÙÚÛÜŲŪŸÝŻŹÑßÇŒÆČŠŽ∂ð /s]{2,64}" title="Solo letras Ejemplo: Fernandez ">
    </div>
    <div class="form-group">
      <label for="">Apellido Materno</label>
      <input type="text"  class="form-control" name="ape_m" placeholder="Apellido Materno" value="<?php echo $r['apellido_mat']?>" required pattern="^[a-zA-ZàáâäãåąčćęèéêëėįìíîïłńòóôöõøùúûüųūÿýżźñçčšžÀÁÂÄÃÅĄĆČĖĘÈÉÊËÌÍÎÏĮŁŃÒÓÔÖÕØÙÚÛÜŲŪŸÝŻŹÑßÇŒÆČŠŽ∂ð /s]{2,64}" title="Solo letras Ejemplo: Dominguez ">
    </div>
    <div class="form-group">
      <label for="">Alias</label>
      <input type="text"  class="form-control" name="alias" placeholder="Alias" value="<?php echo $r['alias']?>" required pattern="^[a-z1-9]{5,12}$" title="Solo letras minusculas y números, sin acentos ni espacios, minimo 5 y máximo 12 Ejemplo: jose01">
    </div>
     <div class="form-group" >
      <label for="">Correo</label>
      <input type="email"  class="form-control" name="correo" placeholder="correo@correo.com" value="<?php echo $r['correo']?>" pattern="^[a-zA-Z0-9.!#$%&’+/=?^_`{|}~-]+@[a-zA-Z0-9-]+(?:\.[a-zA-Z0-9-]+)$" required title="Ejemplo: correo@dominio.com">
    </div>
    <div class="form-group">
      <label for="">Favor de meter su Contraseña o una nueva </label>
      <input type="password"  class="form-control" name="password" placeholder="Contraseña" pattern="[A-Za-z0-9!?-]{5,12}" title="La contraseña debe tener minimo 5 y máximo 12 caracteres" required>
    </div>

    <div class="botones">
      <input type="submit" class="btn btn-primary btn-lg" name="Agregar" >
      <br><br>
    </div>
  </div>
    </form>
</div>
</div>
</body>
<script src="../js/sesion.js"></script>
</html>






