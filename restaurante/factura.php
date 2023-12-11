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

</head>
<body>
    <h2>Factura</h2>

    

    <?php
    if (isset($_SESSION['listaVentas'])) {
        // Acceder a la lista de ventas
        $slistaVenta = $_SESSION['listaVentas'];

        echo "<h3>Cliente: " . $_SESSION['clienteVenta'] . "</h3>";

        echo "<table>";
        echo "<tr>";
        echo "<th>Plato</th>";
        echo "<th>Cantidad</th>";
        echo "<th>¿Plato con Descuento?</th>";
        echo "<th>Descuento</th>";
        echo "<th>Precio Unitario</th>";
        echo "<th>Subtotal</th>";
        echo "<th>Total</th>";
        echo "</tr>";

        echo "<tbody>";
        
        $total_descuento = 0;
        $total_venta = 0;

        foreach($slistaVenta["records"] as $venta)
        {
            
            $total = $venta["cantidad"] * $venta["precio"];
            $descuento = (number_format($venta["precio"], 2) * 0.20) * $venta["cantidad"];
            echo "<tr>";
            echo "<td>" . str_replace("P", "Plato 0", $venta["plato"]) . "</td>";
            echo "<td>" . $venta["cantidad"] . "</td>";
            if($venta["esJubilado"] == 0)
            {
                $total_venta = $total_venta + $total;
                
                echo "<td>No</td>";
                echo "<td>0.00</td>";
                echo "<td>" . $venta["precio"] . "</td>";
                echo "<td>" . ($venta["precio"]* $venta["cantidad"]). "</td>";
                echo "<td>" . $total . "</td>";
            }
            else
            {
                $total_descuento = $total_descuento + $descuento;
                $total_venta = $total_venta + $total;
                echo "<td>Si</td>";
                echo "<td>" .- $descuento . "</td>";
                echo "<td>" . $venta["precio"] . "</td>";
                echo "<td>" . ($venta["precio"]* $venta["cantidad"]). "</td>";
                echo "<td>" . $total - $descuento . "</td>";

            }
            
            echo "</tr>";
        }
        echo "</tbody>";
        echo "</table>";

        echo "<div style='width: 50%; margin: auto; text-align: center; padding: 20px;'>";
        echo "<p>Total Venta: " . $total_venta . "</p>";
        echo "<p>Total Descuento: -" . $total_descuento . "</p>";
        echo "<p>Total a Pagar: " . ($total_venta - $total_descuento) . "</p>";
        echo "</div>";

        echo "<div style='width: 50%; margin: auto; text-align: center; padding: 20px;'>";
        echo "<button id='btnPagar'>Pagar</button>";
        echo "</div>";
    }

    ?>

<script>
        document.getElementById("btnPagar").addEventListener("click", function() {
        window.location.href = "pagar.php";
        });
  </script>
</body>
</html>