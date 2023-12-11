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
        echo "<h2>Total de ventas.</h2>";
        echo "<table>";
        echo "<tr>";
        echo "<th>Resumen</th>";
        echo "<th>Cantidad</th>";
        echo "<th>Total</th>";
        echo "</tr>";
        echo "<tbody>";

        echo "<tr>";
        echo "<td>Cantidad de Ventas Realizadas</td>";

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
        echo "<tr>";
        echo "<td>Cantidad de platos vendidos sin descuento</td>";
        echo "<td>" . $_SESSION['SesTotaPlatosSinDescuento'] . "</td>";
        echo "<td>" . $_SESSION['SesTotalSinDescuento'] ."</td>";
        echo "</tr>";

        echo "<tr>";
        echo "<td>Cantidad de ventas con descuento</td>";
        echo "<td>". $_SESSION['SesTotaPlatosConDescuento'] . "</td>";
        echo "<td>" . $_SESSION['SesTotalConDescuento'] ."</td>";
        echo "</tr>";

        echo "<tr>";
        echo "<td>Total de platos vendidos</td>";
        echo "<td>" . ($_SESSION['SesTotaPlatosConDescuento'] + $_SESSION['SesTotaPlatosSinDescuento']). "</td>";
        echo "<td>" . ($_SESSION['SesTotalConDescuento'] + $_SESSION['SesTotalSinDescuento']). "</td>";

        echo "</tr>";
        
        echo "</tbody>";
        echo "</table>";
        echo "</div>";

        echo "<div class='denominacion'>"; 

        echo "</div>";
        echo "<div style='width: 50%; margin: auto; text-align: center; padding: 20px;'>";
        echo "<button id='btnPagar'>Finalizar</button>";
        echo "</div>";

    ?>

        <script>
        document.getElementById("btnPagar").addEventListener("click", function() {
        window.location.href = "index.php";
        });
  </script>
</body>
</html>