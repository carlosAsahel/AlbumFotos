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
    <title>Ingresar </title>
    <!-- Latest compiled and minified CSS -->

    <link rel="stylesheet" href="../css/header.css">

    <link rel="stylesheet" href="../css/mis_albumes.css">
        <link rel="stylesheet" href="../css/style.css">
  

</head>

<body>
    <header style="align-content: center">
       <div id="logo">

            <img src="../css/img/logo.png" alt="LOGO">

            <h4>Album Familiar</h4>
        </div>
        <div id="Titulo"  >
            <h1>Ingresar</h1>
        </div>
        <div id="Titulo"  >
            </div>
    </header>
    <br><br><br><br>

    <div class="formulario " >
        <div class="inicio">
          <h2> Iniciar Sesión </h2>
       </div>
    <div class="container pt-4" style="padding: auto";>
       
      
    <form action="../php/i.php" method="POST"   class="validated">
   
     <div class="form-group" >
      <label for="">Correo:</label>
      <br>
     <input type="text"  class="form-control" name="correo" placeholder="correo@correo.com"  pattern="[a-zA-Z0-9._\-]+@[a-zA-Z0-9.\-]+\.[a-zA-Z]{2,4}" title="Ejemplo: correo@correo.com" /> 

    </div>
    <div class="form-group">
      <label for="">Contraseña:</label><br>
      <input type="password"  class="form-control" name="password" placeholder="Contraseña" pattern="[A-Za-z0-9!?-]{8,12}" 
        title="la contraseña debe entre 8 y 12 caracteres" required>
    </div>

    <div class="botones">
      <input type="submit" name="Ingresar" value="Ingresar">

    </div>

    <div class="botones">
        ¿no tiene cuenta?
        <a  href="../vistas/registro.php">Registrarse</a>
    </div>
    </form>
     
</div>      
    </div>

</body>

</html>

