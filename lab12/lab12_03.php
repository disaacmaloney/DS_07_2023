<?php
    session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Laboratorio 12 - 03</title>    
    <link rel="stylesheet" href="css/estilo.css">
</head>
<body>
    <h1>Manejo de sesiones</h1>
    <h2>Paso 3: la variable ya ha sido destruida y su valor se ha perdido</h2>

    <?php
        if(isset($_SESSION['var']))
        {
            $var = $_SESSION['var'];

        }
        else
        {
            $var = "";
        }
        echo "<p>Valor de la variable de sesión: " . $var . "</p>";

    ?>
    <a href="lab12_01.php">Volver al Paso 1</a>


</body>
</html>