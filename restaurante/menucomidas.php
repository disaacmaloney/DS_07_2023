<?php
session_start();

$arrVentas = array();

$cliente = "";
$jubilado = 0;
$cantidad;
$plato;
$precio;

if($_SERVER["REQUEST_METHOD"] == "POST" && isset($_SESSION['clienteVenta']))
{
    $arrVentas = $_SESSION['listaVentas'];

    $cliente = $_POST['cliente'];
    $cliente = $_SESSION['clienteVenta'];
    $plato = $_POST['plato'];
    if(isset($_POST['jubilado']))
    {
        $jubilado = 1;
    }
    $cantidad = $_POST['cantidad'];
    switch ($plato) {
        case "P1":
            $precio = 10.00;
            break;
        case "P2":
            $precio = 12.00;
            break;
        case "P3":
            $precio = 17.00;
            break;
        case "P4":
            $precio = 21.00;
            break;
        case "P5":
            $precio = 23.00;
            break;
        case "P6":
            $precio = 13.00;
            break;
        case "P7":
            $precio = 28.00;
            break;
        default:
            $precio = 0.00;
    }

    $arrVenta = array(
        "plato" => $plato,
        "esJubilado" => $jubilado,
        "precio" => $precio,
        "cantidad" => $cantidad
    );
    array_push($arrVentas["records"], $arrVenta);
    $_SESSION['listaVentas'] = $arrVentas;
}
elseif($_SERVER["REQUEST_METHOD"] == "POST" && !isset($_SESSION['clienteVenta']) && !array_key_exists('iniciar', $_POST))
{
    $arrVentas["records"] = array();
    $_SESSION['clienteVenta'] = $_POST['cliente'];
    $cliente = $_POST['cliente'];
    $cliente = $_SESSION['clienteVenta'];
    $plato = $_POST['plato'];
    if(isset($_POST['jubilado']))
    {
        $jubilado = 1;
    }
    $cantidad = $_POST['cantidad'];
    switch ($plato) {
        case "P1":
            $precio = 10.00;
            break;
        case "P2":
            $precio = 12.00;
            break;
        case "P3":
            $precio = 17.00;
            break;
        case "P4":
            $precio = 21.00;
            break;
        case "P5":
            $precio = 23.00;
            break;
        case "P6":
            $precio = 13.00;
            break;
        case "P7":
            $precio = 28.00;
            break;
        default:
            $precio = 0.00;
    }

    $arrVenta = array(
        "plato" => $plato,
        "esJubilado" => $jubilado,
        "precio" => $precio,
        "cantidad" => $cantidad
    );
    array_push($arrVentas["records"], $arrVenta);

    $_SESSION['listaVentas'] = $arrVentas;
    
}
elseif(!isset($_SESSION['clienteVenta']))
{
    $cliente = "";  
}
else{
    $cliente = $_SESSION['clienteVenta'];
}
?>


<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Menú de Comida</title>
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

    <h2>Menú de Comida</h2>

     <div id="opciones-menu">
        <!-- Aquí se mostrarán las opciones del menú -->
        <div id="carrusel-container">
            <div id="carrusel">
                <div class="opcion-menu" data-value="P1" data-nombre="Plato 1" data-precio="$10.00">
                    <img src="img/comida1.jpg" alt="comida1"> 
                    <p>P1 - Plato 1 - $10.00</p>
                </div>
                <div class="opcion-menu" data-value="P2" data-nombre="Plato 2" data-precio="$12.00">
                    <img src="img/comida2.jpg" alt="comida2"> 
                    <p>P2 - Plato 2 - $12.00</p>
                </div>
                <div class="opcion-menu" data-value="P3" data-nombre="Plato 3" data-precio="$17.00">
                    <img src="img/comida3.jpg" alt="comida3"> 
                    <p>P3 - Plato 3 - $17.00</p>
                </div>
                <div class="opcion-menu" data-value="P4" data-nombre="Plato 4" data-precio="$21.00">
                    <img src="img/comida4.jpg" alt="comida4"> 
                    <p>P4 - Plato 4 - $21.00</p>
                </div>
                <div class="opcion-menu" data-value="P5" data-nombre="Plato 5" data-precio="$23.00">
                    <img src="img/comida5.jpg" alt="comida5"> 
                    <p>P5 - Plato 5 - $23.00</p>
                </div>
                <div class="opcion-menu" data-value="P6" data-nombre="Plato 6" data-precio="$13.00">
                    <img src="img/comida6.jpg" alt="comida6"> 
                    <p>P6 - Plato 6 - $13.00</p>
                </div>
                <div class="opcion-menu" data-value="P7" data-nombre="Plato 7" data-precio="$28.00">
                    <img src="img/comida7.jpg" alt="comida7"> 
                    <p>P7 - Plato 7 - $28.00</p>
                </div>
            </div>
        </div>
        <!-- Agrega las opciones para los demás platos -->
    </div>

    <form action="menucomidas.php" method="post">
        <label for="cliente">Cliente:</label>
        <?php echo "<input type='text' name='cliente' required value='$cliente'> "; ?>

        <!-- Selector para elegir un plato -->
        <label for="plato">Seleccione un plato:</label>
        <select name="plato" id="plato" required>
            <!-- Agrega un elemento "img" para cada plato -->
            <option value="P1" data-nombre="Plato 1" data-precio="$10.00">
                <img src="img/comida1.jpg" alt="Plato 1">
                Plato 1 - $10.00
            </option>
			<option value="P2" data-nombre="Plato 2" data-precio="$12.00">
                <img src="img/comida2.jpg" alt="Plato 2">
                Plato 2 - $12.00
            </option>
            <option value="P3" data-nombre="Plato 3" data-precio="$17.00">
                <img src="img/comida3.jpg" alt="Plato 3">
                Plato 3 - $17.00
            </option>
            <option value="P4" data-nombre="Plato 4" data-precio="$21.00">
                <img src="img/comida4.jpg" alt="Plato 4">
                Plato 4 - $21.00
            </option>
            <option value="P5" data-nombre="Plato 5" data-precio="$23.00">
                <img src="img/comida5.jpg" alt="Plato 5">
                Plato 5 - $23.00
            </option>
            <option value="P6" data-nombre="Plato 6" data-precio="$13.00">
                <img src="img/comida6.jpg" alt="Plato 6">
                Plato 6 - $13.00
            </option>
            <option value="P7" data-nombre="Plato 7" data-precio="$28.00">
                <img src="img/comida7.jpg" alt="Plato 7">
                Plato 7 - $28.00
            </option>
            <!-- Agrega las demás opciones -->
        </select>

        <!-- Checkbox para indicar si el cliente es jubilado -->
        <label for="jubilado">¿Es jubilado?</label>
        <input type="checkbox" name="jubilado" id="jubilado">

        <label for="cantidad">Cantidad:</label>
        <input type="number" name="cantidad" min="1" required value="1">
		<button type="button" id="cerrar-turno">Cerrar Turno</button>
        <br>
        <div style="width: 50%; margin: auto; text-align: center; padding: 20px;">
            <button type="submit">Agregar a la Orden</button>
        </div>


        
		
    </form>

    <!-- Lista de platos seleccionados -->
    <h3>Orden Actual:</h3>

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
        echo "<th>Precio</th>";
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
    }

    ?>


    <!-- Detalles de la factura -->
    <div id="factura">
        <h3>Detalles de la Factura</h3>
        <ul id="detalles-factura">
            <!-- Aquí se mostrarán los detalles de la factura -->
        </ul>
        <p>Total a Pagar: $<span id="total-pagar">0.00</span></p>
        <p>Descuento Jubilado (20%): $<span id="descuento">0.00</span></p>
        <p>Total con Descuento: $<span id="total-con-descuento">0.00</span></p>
    </div>

    <!-- Enlace para ir a la factura -->
    <p><a href="factura.php" id="ver-factura">Ver Factura</a></p>

    <script>
        document.getElementById("cerrar-turno").addEventListener("click", function() {
        window.location.href = "cerrarturno.php";
        });

        document.getElementById("btnPagar").addEventListener("click", function() {
        window.location.href = "pagar.php";
        });
  </script>

</body>
</html>


