<?php
// Inicializar sesión
session_start();
 include ("../php/conexion_bd.php");

// Chequeo de un usuario logeado

$id=$_SESSION["id"];
$id_a=$_GET['id_album'];
$nombre=$_GET['nombre'];

//$sql1= "select * from album WHERE id=".$id_a;

$sql1= "select * from albumes_compartidos WHERE id_album=".$id_a;
$query = $con->query($sql1);




?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Agregar Colaboradores </title>
     
  
    <link rel="stylesheet" href="../css/header.css">
    <link rel="stylesheet" href="../css/style.css">
    <link rel="stylesheet" href="../css/mis_albumes.css">
 
</head>
<style type="text/css">
  #id_u{
    display: hidden;} 
  th{
    background-color: rgb(95, 158, 160);
    color: rgb(224, 218, 218);
  
  }
</style>
<body>
<header>
        <div id="logo">

            <img src="../css/img/logo.png" alt="LOGO">

            <h4>Álbum Familiar</h4>
        </div>

        <div id="Titulo">
            <h1>Modificar privilegios</h1>
        </div>

        <div id="Usuario">
            <img src="../css/img/usuario.svg" alt="Foto perfil" id="foto_p">
            <h5 id="alias_usuario">Nombre usuario</h5>
            <label for="btn_opciones"><img src="../css/img/editar.png" alt="Opciones"></label>
            <input type="checkbox" name="btn_opciones" id="btn_opciones">
            <ul id="opciones">
 
                <li> <a href="../php/perfilEditar.php"> Perfil</a></li>
                <li> <a href="../php/salir.php">Salir</a></li>

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
      


      <h2 style=" color: rgb(224, 218, 218)">Nombre de album: <?php echo $nombre?> </h2>
    <form action="../php/aacP.php" method="GET"  class="form-inline">
    
      <input type="text"  id="id_u" class="form-control "   name="nombre" placeholder="id" hidden="true" value="<?php echo $nombre?>">

      <input type="text" hidden="true"  id="id_u" class="form-control"  name="id_a" placeholder="id"  value="<?php echo $id_a;?>">
    <div class="aliasb">

      <label style=" color: rgb(224, 218, 218)">Ingresa alias de usuario:&nbsp;</label>
      <input type="text" class="" name="alias" placeholder="alias" required pattern="^[a-z1-9]{5,12}$" title="Solo letras minusculas y números, sin acentos ni espacios, minimo 5 y máximo 12 Ejemplo: jose01">
   &nbsp;
      <input type="submit" class="" name="Bucar Colaborador" value="Agregar usuario" >
      <br><br>
    </div>
 
</form>
<br>

  <table class="tablaU text-white">
    <tr>
    <th>Usuario</th>
    <th>Privilegios</th>
    <th>Eliminar</th>
    <th>Modificar Privilegios</th>
    </tr>
     <?php while ($r=$query->fetch_array()):?>
      <tr>
        <td>
          <?php $identif=$r['id_usuario'];

 

                $sqlu= "SELECT * FROM usuarios WHERE id ='".$identif."'";



                  $resultado= mysqli_query($con,$sqlu);
                  $fila=mysqli_fetch_array($resultado);



                if (!($fila['alias'])) {
                  echo "no se encontro usuario";
                }else{
                echo $fila['alias'];



                }

          ?>
        </td>
          <td>
          <?php 

          if ($r['permisos']==3) {
          echo "Todos los privilegios";  
          }elseif ($r['permisos']==2) {
            echo "Eliminar Fotos";
          }else{
            echo "Agregar fotos";
          
          }
         ?>
        </td>
        
        <td>
       <a href="../php/eliminarColaborador.php?id=<?php echo $r['id_usuario']."&id_a=".$id_a."&nombre=".$nombre;?>" class="btnEliminar" title="Eliminar" data-toggle="tooltip">Eliminar</a>

        </td>
        <td>
           <a href="../php/privilegiosC.php?id_u=<?php echo $r['id_usuario']."&permisos=1&id_a=".$id_a."&nombre=".$nombre;?>" class="btnAgregarFotos" title="agregarFoto" data-toggle="tooltip">Agregar Fotos</a>

            <a href="../php/privilegiosC.php?id_u=<?php echo $r['id_usuario']."&permisos=2&id_a=".$id_a."&nombre=".$nombre;?>" class="btnEliminar" title="EliminarFoto" data-toggle="tooltip">Eliminar Fotos</a>

             <a href="../php/privilegiosC.php?id_u=<?php echo $r['id_usuario']."&permisos=3&id_a=".$id_a."&nombre=".$nombre;?>" class="btnTodos" title="TodosPriv" data-toggle="tooltip">Ambos privilegios</a>

        </td>
      </tr>
      <?php  endwhile;?>
  </table>
 <br>
</div>
</div>

</body>
<script src="../js/sesion.js"></script>
</html>

