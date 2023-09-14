<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Laboratoio - 03.02</title>
</head>
<body>
<?php
    $diametro = $_POST['diame'];
    echo     $diametro;
    $altura = $_POST['altu'];
    $radio = $diametro/2 ;
    $pi = 3.141593;
    $volumen  = $pi*$radio*$radio*$altura;

    echo "el valor del cilindro es de "+ $volumen  + " metros cubicos";
    ?>
</body>
</html>
