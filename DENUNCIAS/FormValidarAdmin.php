<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Validar Admin</title>
    <link rel="stylesheet" href="css/login.css">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.0.0/animate.min.css">


</head>
<body>
    <div class="Caja">
   <form action="ValidarAdmin.php" method="post">
   <h1 class="animate__animated animate__backInLeft">Validar Admin</h1>
   <p class="blanco">Usuario <input type="text" placeholder="ingrese su nombre" name="usuario"></p>
   <p class="blanco">Tipo de Usuario <input type="tipo_admin" placeholder="ingrese su tipo de ususario" name="password"></p>
   <input class="btn btn-success" type="submit" value="Validar">
   
   </form>
</div> 



</body>
</html>