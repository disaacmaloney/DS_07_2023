<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Laboratorio 14 - 03</title>
    <link rel="stylesheet" href="css/estilo.css">
</head>
<body>
    <h1>Consulta de noticias</h1>
    <?php
        require_once("class/noticias.php");

        $obj_noticias = new noticias();

        $pagina_actual = isset($_GET['pagina']) ? $_GET['pagina'] : 1;
        $noticias_por_pagina = 3;

        $inicio = ($pagina_actual - 1) * $noticias_por_pagina;
        $fin = $inicio + $noticias_por_pagina;

        $noticias = $obj_noticias->consultarNoticiasLimit($inicio, $noticias_por_pagina);

        $nfilas = count($noticias);
        $num_paginas = ceil($noticias[0]["COUNT_LIMIT_PAGE"] / $noticias_por_pagina);

        if($nfilas > 0){
            echo "<p>Mostrando noticias del " . ($inicio + 1) ." al ". min(($inicio + $noticias_por_pagina),  $noticias[0]["COUNT_LIMIT_PAGE"]) ." de un total de " . $noticias[0]["COUNT_LIMIT_PAGE"] . " elementos.</p>";

            echo "<table>";
            echo "<tr>";
            echo "<th>Título</th>";
            echo "<th>Texto</th>";
            echo "<th>Categoría</th>";
            echo "<th>Fecha</th>";
            echo "<th>Imagen</th>";
            echo "</tr>";

            for ($i = 0; $i < $nfilas; $i++) {
                $resultado = $noticias[$i];
                echo "<tr>";
                echo "<td>" . $resultado['TITULO'] . "</td>";
                echo "<td>" . $resultado['TEXTO'] . "</td>";
                echo "<td>" . $resultado['CATEGORIA'] . "</td>";
                echo "<td>" . date("j/n/Y", strtotime($resultado['FECHA'])) . "</td>";
                if($resultado['IMAGEN'] != ""){
                    echo "<td><a target='_blank' href='img/" . $resultado['IMAGEN'] . "'><img src='img/iconotexto.gif'></a></td>";
                }else{
                    echo "<td></td>";
                }                
                echo "</tr>";
            }
            echo "</table>";

            echo "<div>";
            if ($pagina_actual > 1) {
                echo "<a href='?pagina=" . ($pagina_actual - 1) . "'>Anterior</a> ";
            }

            for ($i = 1; $i <= $num_paginas; $i++) {
                echo "<a href='?pagina=$i'>$i</a> ";
            }

            if ($pagina_actual < $num_paginas) {
                echo "<a href='?pagina=" . ($pagina_actual + 1) . "'>Siguiente</a>";
            }
            echo "</div>";
        } else {
            echo "No hay noticias registradas";
        }
    ?>
</body>
</html>