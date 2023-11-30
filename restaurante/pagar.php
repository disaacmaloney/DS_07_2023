<?php
session_start();

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="css/style.css">
    <style>
        /* Establece un tamaño fijo para las imágenes */
        #opciones-menu img {
            width: 300px; /* Ajusta el tamaño según tus necesidades */
            height: 300px;
            margin-right: 5px; /* Añade un espacio entre la imagen y el texto */
        }

        /* Estilo para el carrusel */
        #carrusel-container {
            overflow: hidden;
        }

        #carrusel {
            display: flex;
            transition: transform 1s ease-in-out; /* Ajusta la duración según tus necesidades */
            white-space: nowrap;
        }

        .opcion-menu {
            display: inline-block;
        }

        #factura {
            display: none;
            margin-top: 20px;
        }
        .opciones-menu {
            display: flex;
            justify-content: space-around;
            margin-top: 20px;
            }
    </style>
</head>
<body>
    
    <?php
    if (isset($_SESSION['listaVentas'])) {
        // Acceder a la lista de ventas
        $slistaVenta = $_SESSION['listaVentas'];

        echo "<table>";
        echo "<tr>";
        echo "<th>Plato</th>";
        echo "<th>Cantidad</th>";
        echo "<th>¿Plato con Descuento?</th>";
        echo "<th>Descuento</th>";
        echo "<th>Precio Unitario</th>";
        echo "<th>Subtotal</th>";
        echo "<th>total</th>";
        echo "</tr>";

        echo "<tbody>";
        $t_total = 0;
        $t_descuento = 0;

        foreach($slistaVenta["records"] as $venta)
        {
            $total = $venta["cantidad"] * $venta["precio"];
            $t_total += $total;

            $descuento = (number_format($venta["precio"], 2) * 0.20) * $venta["cantidad"] ;
            echo "<tr>";
            echo "<td>" . str_replace("P", "Plato 0", $venta["plato"]) . "</td>";
            echo "<td>" . $venta["cantidad"] . "</td>";
            if($venta["esJubilado"] == 0)
            {
                echo "<td>No</td>";
                echo "<td>0.00</td>";
            }
            else
            {
                echo "<td>Si</td>";
                echo "<td>" .- $descuento . "</td>";
                $t_descuento += $descuento;

            }
            echo "<td>" . $venta["precio"] . "</td>";
            echo "<td>" . $total . "</td>";
            echo "<td>" . $total - $descuento . "</td>";
            echo "</tr>";
        }
        echo "</tbody>";
        echo "</table>";

        echo "<div>";
        echo "<h1>Factura</h1>";
        echo "<h2>Restaurante</h2>";
        echo "<h3>Fecha: " . date("d/m/Y") . "</h3>";

        echo "<p>subtotal: " . $t_total . "</p>";
        echo "<p>descuento: -" . $t_descuento . "</p>";
        echo "<p>total: " . $t_total - $t_descuento . "</p>";
        echo "</div>";
    }

    if(isset($_SESSION['listaVentas']) && !isset($_POST["denominacion"])){
        echo "<form action='pagar.php' method='POST'>";
        echo "<div style='display: flex; flex-wrap: wrap; justify-content: space-between;'>";
        $denominaciones = ["00.01", "00.05", "00.10", "00.25", "00.50","01.00", "05.00", "10.00", "20.00", "50.00"];
        foreach ($denominaciones as $denominacion) {
            echo "<div class='denominacion'>"; 
            echo "<label  for='denom$denominacion'>Denominación $ $denominacion: </label>";
            echo "<input class='num". $denominacion. "' type='number' name='denominacion[$denominacion]' id='denom$denominacion' min='0' required value='0'>";
            echo "</div>";
            echo "<br>";
        }
        echo "</div>";
        
        echo "<div style='display: flex; flex-wrap: wrap; justify-content: space-between;'>";
        echo "<div class='denominacion'>"; 
        echo '<label for="sumaDenominaciones">Penidente por pagar o devolver:</label>';
        echo '<input type="text" id="sumaDenominaciones" value="0" readonly>';
        echo "</div>";    

        echo "</div>";
        echo "<div style='display: flex; flex-wrap: wrap; justify-content: space-between;'>";
        echo "<div style='width: 50%; margin: auto; text-align: center; padding: 20px;'>";
        echo "<button type='submit' id='btnIngresar' style='display: none;' >Pagar</button>";
        echo "</div>";
        echo "</form>";
    }
    elseif($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["denominacion"])){
        $sumaDenominaciones = 0;
        $denominaciones = $_POST["denominacion"];

        foreach ($denominaciones as $denominacion => $cantidad) {
            // Asegurar que la cantidad sea un número entero positivo
            $cantidad = intval($cantidad);
    
            if ($cantidad < 0) {
                echo "Error: La cantidad de $denominacion no puede ser negativa.";
                echo '<a href="registroventas.php">Volver a ingresar las denominaciones</a>';
                exit;
            }
    
            // Sumar el valor total
            $valorDenominacion =  number_format($denominacion, 2, '.', ',') * $cantidad; 
            echo "Denominación: $denominacion, Cantidad: $cantidad, Valor:  $valorDenominacion<br>";
    
            $sumaDenominaciones += $valorDenominacion;
        }
        echo "Suma total de denominaciones: $sumaDenominaciones<br>";

        echo "Total a pagar: " . ($t_total - $t_descuento) . "<br>";
        echo "Total a devolver: " . ($sumaDenominaciones - ($t_total - $t_descuento)) . "<br>";

        echo "<a href='menucomidas.php'>Volver a ingresar una venta</a>";

        $arrVentas = array(
            "ventas" => $_SESSION['listaVentas'],
            "total" => $t_total,
            "descuento" => $t_descuento,
            "totalPagar" => $t_total - $t_descuento,
            "denominaciones" => $denominaciones,
            "totalDenominaciones" => $sumaDenominaciones,
            "totalDevolver" => $sumaDenominaciones - ($t_total - $t_descuento)
        );

        $arrCli = array(
            "cliente" => $_SESSION['clienteVenta'],
            "ventas" => $arrVentas
        );

        if(isset($_SESSION['listaVentasTerminadas'])){
            $arrayVentas = $_SESSION['listaVentasTerminadas'];
        }else{
            $arrayVentas["records"] = array();

        }


        
        array_push($arrayVentas["records"], $arrCli);
        $_SESSION['listaVentasTerminadas'] = $arrayVentas;
        unset($_SESSION['clienteVenta']);
        unset($_SESSION['listaVentas']);
    }

    


    ?>

<script>
        var inputElement1 = document.getElementById('denom01.00');
        var inputElement2 = document.getElementById('denom05.00');
        var inputElement3 = document.getElementById('denom10.00');
        var inputElement4 = document.getElementById('denom20.00');
        var inputElement5 = document.getElementById('denom50.00');
        var inputElement6 = document.getElementById('denom00.01');
        var inputElement7 = document.getElementById('denom00.05');
        var inputElement8 = document.getElementById('denom00.10');
        var inputElement9 = document.getElementById('denom00.25');
        var inputElement10 = document.getElementById('denom00.50');

        inputElement1.addEventListener('change', function() {
            sumaDenominaciones();
        });

        inputElement2.addEventListener('change', function() {
            sumaDenominaciones();
        });

        inputElement3.addEventListener('change', function() {
            sumaDenominaciones();
        });

        inputElement4.addEventListener('change', function() {
            sumaDenominaciones();
        });

        inputElement5.addEventListener('change', function() {
            sumaDenominaciones();
        });

        inputElement6.addEventListener('change', function() {
            sumaDenominaciones();
        });
         
        inputElement7.addEventListener('change', function() {
            sumaDenominaciones();
        });

        inputElement8.addEventListener('change', function() {
            sumaDenominaciones();
        });

        inputElement9.addEventListener('change', function() {
            sumaDenominaciones();
        });

        inputElement10.addEventListener('change', function() {
            sumaDenominaciones();
        });

        function sumaDenominaciones() {
            var suma = 0;   
            var resultado = 0;
            
            suma += parseInt(inputElement1.value) * 1.00;
            suma += parseInt(inputElement2.value) * 5.00;
            suma += parseInt(inputElement3.value) * 10.00;
            suma += parseInt(inputElement4.value) * 20.00;
            suma += parseInt(inputElement5.value) * 50.00;

            suma += parseInt(inputElement6.value) * 0.01;
            suma += parseInt(inputElement7.value) * 0.05;
            suma += parseInt(inputElement8.value) * 0.10;
            suma += parseInt(inputElement9.value) * 0.25;
            suma += parseInt(inputElement10.value) * 0.50;

            resultado = <?php echo ($t_total - $t_descuento) ?> - suma;

            document.getElementById('sumaDenominaciones').value = resultado.toFixed(2);
            if(resultado == 0)
            {
                document.getElementById('btnIngresar').style.display = 'block';
            }
            else
            {
                document.getElementById('btnIngresar').style.display = 'none';
            }

        }
    </script> 
</body>
</html>