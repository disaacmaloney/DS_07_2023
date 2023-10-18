<?php
    session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Laboratorio 12 - 01</title>    
    <link rel="stylesheet" href="css/estilo.css">
</head>
<body>
    <h1>Manejo de sesiones</h1>
    <h2>Paso 1: se crea la variable de sesión y se almacena</h2>

    <?php
        $var = "ejemplo sesiones";
        $_SESSION['var'] = $var;
        echo "<p>Valor de la variable de sesión: " . $var . "</p>";

    ?>
    <a href="lab12_02.php">Paso 2</a>


</body>
</html>