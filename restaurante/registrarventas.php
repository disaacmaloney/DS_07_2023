<?php

// Obtener los datos del formulario
$cliente = $_POST["cliente"];
$plato = $_POST["plato"];
$cantidad = $_POST["cantidad"];
$jubilado = $_POST["jubilado"];

// Calcular el precio del plato
$precio = floatval($plato);
$precio *= $cantidad;

// Calcular el descuento por jubilado
if ($jubilado) {
  $descuento = $precio * 0.2;
} else {
  $descuento = 0;
}

// Calcular el total
$total = $precio - $descuento;

// Registrar la venta
$sql = "INSERT INTO ventas (cliente, plato, cantidad, jubilado, precio, descuento, total)
VALUES ('$cliente', '$plato', '$cantidad', '$jubilado', '$precio', '$descuento', '$total')";

// Ejecutar la consulta
mysqli_query($link, $sql);

// Redireccionar a la página de orden
header("Location: orden.php");
$link = mysqli_connect("localhost", "root", "", "restaurante");


?>
