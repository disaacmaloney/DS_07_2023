<?php
    if(array_key_exists('calVentas', $_POST)){
        
        $ventas = $_REQUEST['ventas'];
        //var_dump($ventas);

        if ($ventas > 80)
        {
            $indicador = "Excelente";
            $imagen = "img/excelente.png";
        }
        else if ($ventas >= 50 && $ventas <= 79)
        {
            $indicador = "Regular";
            $imagen = "img/regular.png";
        }
        else
        {
            $indicador = "Deficiente";
            $imagen = "img/deficiente.png";
        }
    }


    
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Laboratoio - 04.01</title>
</head>
<body>
    <div>
        <h1>Resultado de Desempeño</h1>
        <h3>indicador de ventas: <?php echo $indicador; ?> </h3>
        <img src="<?php echo $imagen; ?>" alt="<?php echo $indicador; ?>" height="400" width="400" >
    </div>
</body>
</html>