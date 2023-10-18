<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Laboratorio 10 - 02</title>
    <link rel="stylesheet" href="css/estilo.css">
</head>
<body>
    <h1>Encuesta. Resultados de la votación</h1>
    <?php
        require_once("class/votos.php");

        $obj_votos = new votos();
        $result_votos = $obj_votos -> listar_votos();

        foreach($result_votos as $result_voto)
        {
            $votos1 = $result_voto['VOTOS1'];
            $votos2 = $result_voto['VOTOS2'];
        }
        $totalVotos = $votos1 + $votos2;

        echo "<table>";    
        echo "<tr>";
        echo "<th>Respuesta</th>";
        echo "<th>Votos</th>";
        echo "<th width='50'>Porcentajes</th>";
        echo "<th width='400'>Representación Gráfica</th>";
        echo "</tr>";

        echo "<tr>";
        echo "<td class='izquierda'>Si</td>";
        echo "<td class='derecha'>" . $votos1 . "</td>";
        echo "<td class='derecha'>" . round(($votos1 / $totalVotos) * 100, 2) . "%</td>";
        echo "<td class='izquierda'><img src='img/puntoamarillo.gif' height='10' width='".(round(($votos1 / $totalVotos) * 100, 2)*4)."'></td>";
        echo "</tr>";

        echo "<tr>";
        echo "<td class='izquierda'>No</td>";
        echo "<td class='derecha'>" . $votos2 . "</td>";
        echo "<td class='derecha'>" . round(($votos2 / $totalVotos) * 100, 2) . "%</td>";
        echo "<td class='izquierda'><img src='img/puntoamarillo.gif' height='10' width='".(round(($votos2 / $totalVotos) * 100, 2)*4)."'></td>";
        echo "</tr>";
        
        echo "</table>";

        echo "<br>";
        echo "<p>Número total de votos emitidos:" . $totalVotos . "</p>";
        echo "<a href='lab10_01.php'>Volver a la encuesta</a>";
    ?>
    
</body>
</html>