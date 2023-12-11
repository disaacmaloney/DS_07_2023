<?php
    session_start();
    unset($_SESSION['listaVentas']);
    unset($_SESSION['clienteVenta']);
    unset($_SESSION['SesTotaPlatosConDescuento']);
    unset($_SESSION['SesTotaPlatosSinDescuento']);
    unset($_SESSION['SesSubtotal']);
    unset($_SESSION['SesTotal']);
    unset($_SESSION['SesDescuento']);
    unset($_SESSION['SesTotalConDescuento']);
    unset($_SESSION['SesTotalSinDescuento']);
    unset($_SESSION['listaVentasTerminadas']);
    unset($_SESSION['SesTotalPlatos']);
    unset($_SESSION['SesTotalPlatosSinDescuento']);
    unset($_SESSION['SesTotalPlatosConDescuento']);

    ?>
    
    
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registro Ventas Restaurante</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>

    <h2>Registro Ventas Restaurante</h2>

    <!-- Formulario de inicio y cierre de turno -->
    <form action="menucomidas.php" method="post">
        <label for="turno">Seleccione una opción:</label>
        <select name="turno" id="turno" required>
            <option value="inicio">Iniciar Turno</option>
            <option value="cierre">Cerrar Turno</option>
        </select>
        <button type="submit" name="iniciar">Enviar</button>
    </form>

    <!-- Resto del formulario de registro de ventas -->
    <script src="js/main.js"></script>
    <script>
        function redirectTomenucomidas() {
            window.location.href = 'menucomidas.html';
        }
    </script>
</body>
</html>
