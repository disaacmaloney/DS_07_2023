<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?PHP
        $numero = 0;
        if ($_SERVER["REQUEST_METHOD"] === "POST") {
            $numero = $_POST["num"];

            if($numero < 6 || $numero > 100){
                echo "El número debe ser mayor o igual a 6 y menor o igual a 100";
                exit();
            }
            if($numero % 2 != 0){
                echo "El número debe ser par";
                exit();
            }

            $matriz = array_fill(0, $numero, array_fill(0, $numero, 0));
        } 

        echo "El número que a mostrar es: " . $numero;

        
        
        function generarNumeroParMayorIgualA6() {
            $numeroAleatorio = rand(6, 100);
            $numeroPar = ($numeroAleatorio % 2 == 0) ? $numeroAleatorio : ($numeroAleatorio + 1);        
            return $numeroPar;
        }

        $valorX = 0;
        $valorY = 0;

        for ($i = 0; $i < $numero; $i++) {
            for ($j = 0; $j < $numero; $j++) {
                if ($i < 2 || $i > $numero - 3) 
                {
                    if($j < 2 || $j > $numero - 3){
                        $matriz[$i][$j] = generarNumeroParMayorIgualA6();
                        if($i < 2){
                            $valorX += $matriz[$i][$j];
                        }
                        else{
                            $valorY += $matriz[$i][$j];
                        }
                        
                    }
                    else
                    {
                        $matriz[$i][$j] = 0;
                    }
                }
                else{
                    $matriz[$i][$j] = 0;
                }
            }
        }

        
        echo "<table border=1>";
        for ($i = 0; $i < $numero; $i++) {
            echo "<tr>";
            for ($j = 0; $j < $numero; $j++) {
                echo "<td>", $matriz[$i][$j] ,"</td>";
            }
            echo "</tr>";
        }
        echo "</table>";

        echo "<br> La suma de las 2 primeras filas es de ". $valorX;
        echo "<br> La suma de las 2 ultimas filas es de ". $valorY;

           
    ?>
</body>
</html>