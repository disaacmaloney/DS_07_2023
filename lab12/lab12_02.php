<?php
    session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Laboratorio 12 - 02</title>    
    <link rel="stylesheet" href="css/estilo.css">
</head>
<body>
    <h1>Manejo de sesiones</h1>
    <h2>Paso 2: Se accede a la variable de sesión almacenada y se destruye</h2>

    <?php
        if(isset($_SESSION['var']))
        {
            $var = $_SESSION['var'];
            echo "<p>Valor de la variable de sesión: " . $var . "</p>";
            unset($_SESSION['var']);
            echo "<a href='lab12_03.php'>Paso 3</a>";
        }
        else
        {
            echo "<p>La variable de sesión no existe regrese al paso 1</p>";
            echo "<a href='lab12_01.php'>Paso 1</a>";
        }

    ?>
    


</body>
</html>