<?php
    include("lab06_02_lib.php");

    $cliente1 = new cliente("Pepe", 1);
    $cliente2 = new cliente("Roberto", 765);

    echo "<br> El identificador del cliente 1 es: " . $cliente1->dame_numero();
    echo "<br> El identificador del cliente 2 es: " . $cliente2->dame_numero();
?>
        