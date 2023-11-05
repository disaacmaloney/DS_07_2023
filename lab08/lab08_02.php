<?php
require "lab08_02_lib.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $numero = $_POST['numberButton'];

    $calculator = new FactorialCalculator();

    $factorial = $calculator->calculateFactorial($numero);
}
?>

<!DOCTYPE html>
<html>

<head>
    <title>Laboratoio - 08.02</title>
</head>
<body>
    <div >
        <h2 style="font-size: 2rem;">Resultado del Factorial</h2>
        <?php if (isset($factorial)) : ?>
            <p>El factorial de <?php echo $numero; ?> es <?php echo $factorial; ?></p>
        <?php else : ?>
            <p>Ingrese un número válido.</p>
        <?php endif; ?>
    </div>

</body>

</html>