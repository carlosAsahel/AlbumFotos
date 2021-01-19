<?php

// inicializar la sesion 
session_start();

$id=$_SESSION["id"];
?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Crear Album </title>
    
    <link rel="stylesheet" href="../css/header.css">
    <link rel="stylesheet" href="../css/style.css">

</head>

<body>
     <header>
        <div id="logo">

            <img src="../css/img/logo.png" alt="LOGO">

            <h4>Album Familiar</h4>
        </div>

        <div id="Titulo">
            <h1>Crear Álbum</h1>
        </div>

        <div id="Usuario">
            <img src="../css/img/usuario.svg" alt="Foto perfil" id="foto_p">
            <h5  id="alias_usuario">Usuario</h5>
            <label for="btn_opciones"><img src="../css/img/editar.png" alt="Opciones"></label>
            <input type="checkbox" name="btn_opciones" id="btn_opciones">
            <ul id="opciones">
                 <li><a href="../php/perfilEditar.php"> Perfil</a></li>
                <li> <a href="../php/salir.php"> Salir</a> </li>
       
       
              </ul>
        </div>

        <input type="checkbox" name="btn_menu" id="btn_menu">
        <section id="menu">
          <ul>
            <li> <a href="../vistas/mis_albumes.html" > Mis albumes </a></li>
                <li> <a href="../vistas/agregar_album.php">Nuevo álbum</a> </li>
                <li> <a href="../vistas/compartidos_conmigo.html">Compartidos conmigo</a></li>
                <li><a href="../php/buscar_album.php">Buscar álbum</a></li>
          </ul>
          <label for="btn_menu"><img src="../css/img/flecha.png" alt="Flecha"></label>
         
    
        </section>
    </header>
    <br><br><br><br>

<div class="formulario" >

    <div class="container pt-4" style="  padding: auto">

    <form action="../php/aa.php" method="GET"  class="validated">
    
    <input type="text" hidden="true" id="id_u" class="form-control"  name="id_usuario" placeholder="id" value="<?php echo $id;?>">
    <div class="form-group">

      <label for="">Ingresa nombre para el álbum</label><br>
      <input type="text"  name="nombre" placeholder="Nombre" pattern="[a-zA-ZàáâäãåąčćęèéêëėįìíîïłńòóôöõøùúûüųūÿýżźñçčšžÀÁÂÄÃÅĄĆČĖĘÈÉÊËÌÍÎÏĮŁŃÒÓÔÖÕØÙÚÛÜŲŪŸÝŻŹÑßÇŒÆČŠŽ∂ð ,.'-]{2,48}" title="Solo palabras Ejemplo: nombreÁlbum " required>
    </div>
    <div class="form-group">
      <label for="">Descripción</label><br>
      <input type="text-area"  class="form-control" name="descripcion" placeholder="Descripcion" required>
    </div>
      

    <div class="botones">
      <input type="submit" class="" value="Crear" >
       <a href="../vistas/mis_albumes.html" class="btncancelar" value="Cancelar" >Cancelar</a>
      <br><br>
    </div>
  </div>
    </form>
</div>
</div>
<script src="../js/sesion.js"></script>

</body>

</html>

