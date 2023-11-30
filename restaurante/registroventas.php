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
    // Código para manejar el inicio y cierre de turno
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["turno"])) {
    $opcion = $_POST["turno"];

    if ($opcion == "inicio") {
        // Lógica para iniciar un turno
        echo "<h2>Turno iniciado.</h2>";
        echo "<p>Puedes comenzar a registrar ventas.</p>";

        // Formulario para ingresar las denominaciones
        echo '<form action="registroventas.php" method="post">';
        
        // Casillas para ingresar las denominaciones
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

        // Cuadro para mostrar la suma de las denominaciones
        
    echo "<div style='display: flex; flex-wrap: wrap; justify-content: space-between;'>";
    echo "<div class='denominacion'>"; 
    echo '<label for="sumaDenominaciones">Suma de Denominaciones:</label>';
    echo '<input type="text" id="sumaDenominaciones" value="0" readonly>';
    echo "</div>";    
    echo "</div>";    


       
        echo '<br>';

        echo '<button type="submit">Registrar</button>';
        echo '</form>';
        
    } elseif ($opcion == "cierre") {
        // Lógica para cerrar un turno
        echo "Turno cerrado. Información del cierre de turno:";
        // Aquí se mostrarán los informes del cierre de turno
    }
}

// Código para manejar el registro de la cantidad de dinero y denominaciones
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["denominacion"])) {
    $denominaciones = $_POST["denominacion"];

    // Validar la suma de las denominaciones
    $sumaDenominaciones = 0;

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

    // Opción para ir al menú de comidas después de registrar el dinero
    echo '<p><a href="menucomidas.php">Ir al Menú de Comida</a></p>';
    
    $_SESSION['listaDenominaciones'] = $denominaciones;
    exit;  // Detener la ejecución del resto del código
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


            document.getElementById('sumaDenominaciones').value = suma.toFixed(2);
        }
    </script> 
</body>
</html>

