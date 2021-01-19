<?php
// inicializar la sesion 
session_start();
 
// Verificar sí hay un usuario logeado
if(isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === true){
    header("location:../vistas/mis_albumes.html");
    exit;
}

?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registrarse </title>
    <link rel="stylesheet" href="../css/header.css">
    <link rel="stylesheet" href="../css/style.css">

</head>

<body>
    <header style="align-content: center">
       <div id="logo">

            <img src="../css/img/logo.png" alt="LOGO">

            <h4>Album Familiar</h4>
        </div>
        <div id="Titulo"  >
            <h1>Registro</h1>
        </div>
        <div id="Titulo"  >
        </div>
        
    </header>
    <br><br><br><br>

 <div class="formulario_reg" >

        <div class="inicio">
          <h2>Registra tus datos   </h2>
       </div>
    <div class="container pt-4" style="  ">

    <form action="../php/r.php" method="POST" enctype="multipart/form-data"  class="validated">
     <div class="botones">
    
         
              <img id="imagenPrevisualizacion" style="background-size: cover;"  width="100" height="100">
              <br><br>
              <input type="file" name="imagen" id="seleccionArchivos" required>
              <script src="../js/prevImg.js"></script>
              <br>
    </div>
    <table  width="80%" >

      <tr>
        <td><label for="">Apellido Paterno:</label></td>
        <td><input type="text"  class="form-control" name="ape_p" placeholder="Apellido Paterno"  pattern="[a-zA-ZàáâäãåąčćęèéêëėįìíîïłńòóôöõøùúûüųūÿýżźñçčšžÀÁÂÄÃÅĄĆČĖĘÈÉÊËÌÍÎÏĮŁŃÒÓÔÖÕØÙÚÛÜŲŪŸÝŻŹÑßÇŒÆČŠŽ∂ð ,.'-]{2,64}"  required></td>
       </tr>
       <tr>
        <td><label for="">Apellido Materno:</label></td>
        <td><input type="text"  class="form-control" name="ape_m" placeholder="Apellido Materno"  pattern="[a-zA-ZàáâäãåąčćęèéêëėįìíîïłńòóôöõøùúûüųūÿýżźñçčšžÀÁÂÄÃÅĄĆČĖĘÈÉÊËÌÍÎÏĮŁŃÒÓÔÖÕØÙÚÛÜŲŪŸÝŻŹÑßÇŒÆČŠŽ∂ð ,.'-]{1,64}"  required></td>
        
       </tr>
       <tr>
      <td><label for="">Ingresa tu nombre:</label></td>
      <td><input type="text" class="form-control  " name="nombre" placeholder="Nombre(s)" pattern="[a-zA-ZàáâäãåąčćęèéêëėįìíîïłńòóôöõøùúûüųūÿýżźñçčšžÀÁÂÄÃÅĄĆČĖĘÈÉÊËÌÍÎÏĮŁŃÒÓÔÖÕØÙÚÛÜŲŪŸÝŻŹÑßÇŒÆČŠŽ∂ð ,.'-]{2,48}"  required>   </td>
       </tr>
      <tr>
        <td><label for="">Alias:</label></td>
      <td><input type="text"  class="form-control" name="alias" placeholder="Alias" pattern="^([a-z]+[0-9]{0,2}){5,12}$" required title="Solo letras minúsculas 5 y 12 caracteres y opcionalmente dos numeros finales. Ejemplo: usuario01"  required> </td>
      </tr>
      <tr>
      <td><label for="">Correo:</label></td>
      <td><input type="text"  class="form-control" name="correo" placeholder="correo@correo.com"  pattern="[a-zA-Z0-9._\-]+@[a-zA-Z0-9.\-]+\.[a-zA-Z]{2,4}" required title="Ejemplo: correo@correo.com" />  </td>
      </tr>
      <tr>
          <td><label for="">Contraseña:</label></td>
        <td><input type="password"  class="form-control" name="password" placeholder="Contraseña" pattern="[A-Za-z0-9!?-]{8,12}" title="La contraseña debe entre 8 y 12 caracteres"  required></td>
      </tr>
            
    </table>

    <div  class="botones">
      <input type="submit" value="Registrarme" >
       <a class="btncancelar" href="../vistas/ingresar.php">Cancelar</a>
      <br><br>
    </div>
  </div>
    </form>
</div>
</div>
</body>

</html>

