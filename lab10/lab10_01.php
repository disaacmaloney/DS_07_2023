<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Laboratorio 10 - 01</title>
    <link rel="stylesheet" href="css/estilo.css">
</head>
<body>
    <?php
        require_once("class/votos.php");

        if(array_key_exists('enviar', $_POST))
        {
            print("<h1>Encuesta. Voto resgistrado </h1>");
            $obj_votos = new votos();
            $result_votos = $obj_votos -> listar_votos();

            foreach($result_votos as $result_voto)
            {
                $votos1 = $result_voto['VOTOS1'];
                $votos2 = $result_voto['VOTOS2'];
            }

            $voto = $_REQUEST['voto'];
            if($voto == "si")
            {
                $votos1 = $votos1 + 1;
            }
            else
            {
                $votos2 = $votos2 + 1;
            }

            $obj_votos = new votos();
            $result = $obj_votos -> actualizar_votos($votos1, $votos2);

            if($result)
            {
                print("<p>Su voto ha sido registrado. Gracias por participar</p>\n");
                print("<a href='lab10_02.php'>Ver resultados</a>");
            }
            else
            {
                print("<a href='lab10_01.php'>Error al votar</a>");
            }

        }
        else
        {

        

        
    ?>
    <h1>Encuesta</h1>
    <p>¿Cree ud. que el precio de la vivienda seguira subiendo al ritmo actual?</p>

    <form action="lab10_01.php" method="POST">
        <input type="radio" name="voto" value="si"  CHECKED>Si<br>
        <input type="radio" name="voto" value="no">No<br><br>
        <input type="submit" name="enviar" value="Votar">
    </form>

    <a href="lab10_02.php">Ver resultados</a>
    <?php
         }       
    ?>
</body>
</html>