<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Laboratoio - 02.05</title>
</head>
<body>
    <?php
        $figuras = array('cuadrado', 'triangulo', 'circulo');
        $figuras[1] = 'rectangulo';
        mostrar_figuras($figuras, "asignacion de rectangulo");

        array_push($figuras, 'pentagono');
        mostrar_figuras($figuras, "adicion del pentagono al final");

        array_unshift($figuras, 'hexagonal');
        mostrar_figuras($figuras, "adicion del hexagonal al inicio");
        
        array_pop($figuras);
        mostrar_figuras($figuras, "eliminacion del ultimo registro");

        function mostrar_figuras($figuras, $mensajes)
        {
            echo "<br> Arreglo despues de $mensajes <br>";
            foreach($figuras as $figura)
            {
                echo "$figura <br>";
            }
        }        
    ?>    
</body>
</html>