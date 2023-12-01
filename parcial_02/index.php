<?php
    require_once('Factorial.php');
    $objFactorial = new Factorial();
    $result = $objFactorial->GetFactorial();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h2>Calculadora factorial</h2>
    <form action="index.php" method="post">
        <label>Ingrese el valor a calcular: </label>
        <input type="number" name="numFactorial" id="numFactorial" min="1" value="1">
        <br>
        <br>
        <button type="submit">CALCULAR</button>
    </form>
    <?php
        if(isset($_POST["numFactorial"])){
            
            $numFactorial = $_POST["numFactorial"];
            $factorial = 1;
            for($i = 1; $i <= $numFactorial; $i++){
                $factorial += $i;
            }
            $objFactorialPost = new Factorial();
            $resultPost = $objFactorial->PostFactorial(intval($numFactorial));
            echo "<br>";
            echo "<h3>El valor ingresado es: ".$_POST["numFactorial"]."</h3>";
            echo "<h3>El valor del factorial ingresado es de $numFactorial</h3>";
        }
        //valida que result tenga un valor
        if(isset($result)){
            echo "<table border='1'>";
            echo "<tr>";
            echo "<th>ID</th>";
            echo "<th>NUMERO</th>";
            echo "<th>FACTORIAL</th>";
            echo "<th>SUMA FACTORIAL</th>";
            echo "</tr>";
            foreach($result as $key => $value){
                echo "<tr>";
                echo "<td>".$value["ID"]."</td>";
                echo "<td>".$value["NUM"]."</td>";
                echo "<td>".$value["FACTO"]."</td>";
                echo "<td>".$value["SUM_FACTO"]."</td>";
                echo "</tr>";
            }
            echo "</table>";
        }
    ?>

</body>
</html>

