<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Laboratorio 14 - 02</title>
    <link rel="stylesheet" href="css/estilo.css">
</head>
<body>
    <h1>Consulta de noticias</h1>
    <?php
        require_once("class/noticias.php");

        $obj_noticias = new noticias();
        $noticias = $obj_noticias->consultarNoticias();

        $nfilas = count($noticias);

        if($nfilas > 0){
            echo "<table>";
            echo "<tr>";
            echo "<th>Título</th>";
            echo "<th>Texto</th>";
            echo "<th>Categoría</th>";
            echo "<th>Fecha</th>";
            echo "<th>Imagen</th>";
            echo "</tr>";

            foreach($noticias as $resultado){
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
        }
        else{
            echo "No hay noticias registradas";
        }
    ?>
</body>
</html>