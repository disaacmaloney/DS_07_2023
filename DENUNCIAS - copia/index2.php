<?php
    if(array_key_exists('frmLogin', $_POST)) {
    $miArray = $_POST;
  
    $usuario = $_POST['usuario'];
    $password = $_POST['password'];

  
    require_once("class/login.php");
    $objTasks = new Login();
    $result = $objTasks->login($usuario, $password);
    print_r($result)
  }
?>


<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>login</title>
    <link rel="stylesheet" href="css/login.css">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.0.0/animate.min.css">
    <!--<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">-->

</head>
<body>
    <div class="Caja">
   <form action="index.php" method="post">
   <h1 class="animate__animated animate__backInLeft">Login</h1>
   <p class="blanco">Usuario <input type="text" placeholder="ingrese su nombre" name="usuario"></p>
   <p class="blanco">Contraseña <input type="password" placeholder="ingrese su contraseña" name="password"></p>
   <input class="btn btn-success" name="frmLogin" type="submit" value="Ingresar">
   
   </form>
</div> 



</body>
</html>