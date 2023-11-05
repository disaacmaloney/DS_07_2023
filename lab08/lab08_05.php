<?php
require "lab08_05_lib.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $N = intval($_POST['orden']);
    $matrixGenerator = new IdentityMatrixGenerator($N);
    $matrixGenerator->generateIdentityMatrix();
    $matriz = $matrixGenerator->getMatrix();
}
?>

<!DOCTYPE html>
<html>

<head>
    <title>Laboratoio - 08.05</title>
</head>

<body>
    <h1>Matriz Identidad de Orden <?php echo $N; ?></h1>
    <?php if (isset($matriz)) : ?>
        <table border="1">
            <?php foreach ($matriz as $fila) : ?>
                <tr>
                    <?php foreach ($fila as $elemento) : ?>
                        <?php if ($elemento == 1) : ?>
                            <td style="background-color: blue; color: white;"><?php echo $elemento; ?></td>
                        <?php else : ?>
                            <td><?php echo $elemento; ?></td>
                        <?php endif; ?>
                    <?php endforeach; ?>
                </tr>
            <?php endforeach; ?>
        </table>
    <?php endif; ?>
</body>

</html>