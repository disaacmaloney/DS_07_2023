<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lab 2.3</title>
</head>

<body>
    <?php
    if (array_key_exists('enviar', $_POST)) {
        if ($_REQUEST['Apellido'] != "") {
            echo "El apellido es: " . $_REQUEST['Apellido'];
        } else {
            echo "favor coloque el apellido";
        }

        echo "<br />";

        if ($_REQUEST['Nombre'] != "") {
            echo "El nombre ingresado es: " . $_REQUEST['Nombre'];
        } else {
            echo "Favor coloque el nombre";
        }
    } else {
    ?>
        <form action="lab03_03.php" method="POST">
            nombre: <input type="text" name="Nombre" value="" />
            <br />
            apellido: <input type="text" name="Apellido" value="" />
            <br />
            <input type="submit" name="enviar" value="Enviar Datos" />
        </form>
    <?php
    }
    ?>
</body>

</html>