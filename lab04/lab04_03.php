<?php
    $values = array();
    while (count($values) < 20) {
        $numero = rand(1, 100);
        if (!in_array($numero, $values)) {
            $values[] = $numero;
        }
    }

    $max = max($values);
    $position = array_search($max, $values);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Laboratoio - 04.03</title>
</head>
<body>
    <h1>Resultado</h1>
    <p>Elemento mayor: <?php echo $max; ?></p>
    <p>Posición del elemento mayor: <?php echo $position; ?></p>
</body>
</html>