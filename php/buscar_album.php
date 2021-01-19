<?php
// Inicializar sesión
session_start();
 
// Chequeo de un usuario logeado

$id=$_SESSION["id"];
?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Buscar Álbum </title>
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
            <h2><b>Buscar Álbum</b></h>
        </div>

        <div id="Usuario">
            <img src="../css/img/usuario.svg" alt="Foto perfil" id="foto_p"> 
            <h6 id="alias_usuario">Usuario</h6>
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
                <li> <a href="../vistas/mis_albumes.html" > Mis álbumes </a></li>
                <li> <a href="../vistas/agregar_album.php">Nuevo álbum</a> </li>
                <li> <a href="../vistas/compartidos_conmigo.html">Compartidos conmigo</a></li>
                <li><a href="../php/buscar_album.php">Buscar álbum</a></li>
                
          </ul>
          <label for="btn_menu"><img src="../css/img/flecha.png" alt="Flecha"></label>
         
    
        </section>
    </header>
    <br><br><br><br>
    <div class="formulario_p">
      
    <div  class="container pt-4" style="  padding: auto">

    <form action="../php/aacBuscar.php" method="GET"  class="validated">
    
      <input type="text" hidden="true" id="id_u" class="form-control"  name="id_usuario" placeholder="id" value="<?php echo $id;?>">
      <div class="form-group">

      <label for="">Ingresa nombre del álbum:</label>
      <input required type="text" class="form-control" name="nombre" placeholder="Nombre">
    </div>
    
      

    <div class="botones">
      <input type="submit" class="btn btn-primary btn-lg" name="Crear" >
      <br><br>
    </div>
  </div>
    </form>
</div>
</div>
</body>
<script src="../js/sesion.js"></script>
</html>

