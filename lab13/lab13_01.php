<?php
    if(isset($_COOKIE['contador']))
    {
        setcookie("contador", $_COOKIE['contador'] + 1, time() + 365 * 24 * 60 * 60);
        $mensaje = "Gracias por visitarnos. Número de visitas: " . $_COOKIE['contador'];
    }
    else
    {
        setcookie("contador", 1, time() + 365 * 24 * 60 * 60);
        $mensaje = "Bienvenido a nuestra página web";
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Laboratorio 13 - 01</title>    
    <link rel="stylesheet" href="css/estilo.css">
</head>
<body>
    <h1>contador de visitas con Cookies</h1>
    <h3><?php echo $mensaje ?> </h3>
</body>
</html>

