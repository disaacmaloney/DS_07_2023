<?php
    if(array_key_exists('enviar', $_POST))
    {
        $expire = time() + 60 * 5;
        setcookie("user", $_REQUEST['visitante'], $expire);
        header("Refresh:0");
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Laboratorio 13 - 02</title>    
    <link rel="stylesheet" href="css/estilo.css">
</head>
<body>
    <h1>Creación de cookies</h1>
    <h2>La cookie de "user" tendra 5 minutos de duración</h2>

    <?php
        if(isset($_COOKIE['user']))
        {
            echo "<br/> Hola <b>".$_COOKIE["user"]."</b> gracias por visitar nuestra página web. </br>";
        }
        else
        {
            ?>
            <form action='lab13_02.php' method='post' name='formCookies'>
                <br/> Hola, Primera vez que te vemos en nuestro sitio web. ¿Como te llamas?
                
                <input type='text' name='visitante'>
                 <input type='submit' name='enviar' value='Gracias por identificarte'>
            </form>
            <?php
        }
    ?>
    <br/>
    <a href="lab13_03.php">Continuar...</a>
</body>
</html>

