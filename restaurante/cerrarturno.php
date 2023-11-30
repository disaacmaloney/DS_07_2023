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
    <?php
        echo "<div style='display: flex; flex-wrap: wrap; justify-content: space-between;'>";
        echo "<div class='denominacion'>"; 
        echo "<h2>Total en caja.</h2>";
        if(isset($_SESSION['listaDenominaciones'])){
            $slistaDenominaciones = $_SESSION['listaDenominaciones'];
            echo "<table>";
            echo "<tr>";
            echo "<th>Denominación</th>";
            echo "<th>Cantidad</th>";
            echo "<th>Total</th>";
            echo "</tr>";
            foreach ($slistaDenominaciones as $denominacion => $cantidad) {
                echo "<tr>";
                echo "<td>$denominacion</td>";
                echo "<td>$cantidad</td>";
                echo "<td>$". $denominacion * $cantidad ."</td>";
                echo "</tr>";
            }
            echo "</table>";
        }
        echo "</div>";
        echo "<div class='denominacion'>"; 
        echo "<h2>Total de ventas.</h2>";
        echo "<table>";
        echo "<tr>";
        echo "<th>Resumen</th>";
        echo "<th>Cantidad</th>";
        echo "<th>Total</th>";
        echo "</tr>";
        echo "<tbody>";

        echo "<tr>";
        echo "<td>Cantidad de clientes</td>";

        if(isset($_SESSION['listaVentasTerminadas'])){
            $slistaVentasTerminadas = $_SESSION['listaVentasTerminadas'];
            $listVenta = $slistaVentasTerminadas["records"];
            echo "<td>". count($listVenta) ."</td>";
            echo "<td>". count($listVenta) ."</td>";
        }else{
            echo "<td>0</td>";
            echo "<td>0</td>";
        }
        echo "</tr>";

        echo "<td>Cantidad de ventas con descuento</td>";

        if(isset($_SESSION['listaVentasTerminadas'])){
            $slistaVentasTerminadas = $_SESSION['listaVentasTerminadas'];
            $listVenta = $slistaVentasTerminadas["records"];
            print_r($listVenta);
            print_r($listVenta["ventas"]);
            $cliente = $listVenta["ventas"];
            if(count($cliente) > 0){
                $descuento = 0;
                foreach ($cliente as $venta) {
                    print_r($venta);
                    if($venta["esJubilado"] > 0){
                        $descuento++;
                    }
                }
                echo "<td>". $descuento ."</td>";
                echo "<td>". $descuento ."</td>";
            }
        }else{
            echo "<td>0</td>";
            echo "<td>0</td>";
        }
        echo "</tr>";
        
        echo "</tbody>";
        echo "</table>";
        echo "</div>";

        echo "<div class='denominacion'>"; 

        echo "</div>";
        echo "</div>";

    ?>
</body>
</html>