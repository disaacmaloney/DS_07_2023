<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Laboratoio - 02.0</title>
</head>
<body>
    <?php
        $persona = array(
            array("nombre" => "Rosa", "Estatura" => 168, "Sexo" => "F"),
            array("nombre" => "Ignacio", "Estatura" => 175, "Sexo" => "M"),
            array("nombre" => "Daniel", "Estatura" => 172, "Sexo" => "M"),
            array("nombre" => "Ruben", "Estatura" => 182, "Sexo" => "M")
        );

        echo "<b> DATOS DEL PERSONAL </b><br><hr>";
        $numPersonas = count($persona);
        for($i = 0; $i < $numPersonas; $i++)
        {
            echo "Nombre: <b>", $persona[$i]['nombre'] , "</b><br>";
            echo "Estatura: <b>", $persona[$i]['Estatura'] , "</b><br>";
            echo "Sexo: <b>", $persona[$i]['Sexo'] , "</b><br><hr>";

        }

    ?>  
</body>
</html>