<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Laboratorio 13 - 03</title>    
    <link rel="stylesheet" href="css/estilo.css">
</head>
<body>
    <h1>Recuperar el valor de una Cookies</h1>
    <?php
        if(isset($_COOKIE['user'])){
            echo "<h2>Bienvenido: ".$_COOKIE['user']."</h2><br/>";
        }
        else
        {
            echo "<h2>Bienvenido Invitado</h2><br/>";
        }
    ?>
    <a href="lab13_02.php">Regresar...</a>&nbsp;&nbsp;
    <a href="lab13_04.php">Continuar...</a>

</body>
</html>


