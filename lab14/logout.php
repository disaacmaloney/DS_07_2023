<?php
    session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Laboratorio 14 - Logout</title>
</head>
<body>

<?php
    if(isset($_SESSION['usuarioValido']))
    {
        session_destroy();
        echo "<br><br><br>";
        echo "<p allign='center'>Conexion finalizada</p><br>";
        echo "<p allign='center'><a href='login.php'>Conectar</a></p>";
    }
    else
    {
        echo "<br><br><br>";
        echo "<p allign='center'>No existe una conexión activa</p>";
        echo "<p allign='center'><a href='login.php'>Conectar</a></p>";
    }
?>
    
</body>
</html>