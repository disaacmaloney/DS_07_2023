<?php
    if(array_key_exists("genMatriz", $_POST))
    {
        $numMatriz = $_REQUEST["order"];
        //var_dump($numMatriz);
        if($numMatriz % 2 != 0){
            $numMatriz = $numMatriz + 1;
            echo "<p>El número ingresado no es par, se le sumó 1 para que sea par</p>";
            echo "<p>El número de la matriz es: $numMatriz</p>";
        }
        
        $matriz = array();
        for($i =0 ; $i < $numMatriz; $i++){
            $fila = array();
            for($j = 0; $j < $numMatriz; $j++){
                if($i == $j){
                    $fila[] = 1;
                }
                else{
                    $fila[] = 0;
                }
            }
            $matriz[] = $fila;
        }
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Laboratoio - 04.05</title>
</head>
<body>
    <h1>Matriz Identidad de Orden <?php echo $numMatriz; ?></h1>
    <?php if(isset($matriz)): ?>
        <table border="1">
            <?php for($i = 0; $i < $numMatriz; $i++): ?>
                <tr>
                    <?php for($j = 0; $j < $numMatriz; $j++): 
                        if ($matriz[$i][$j] == 1){ ?>
                            <td style="background-color: blue; color: white;"><?php echo $matriz[$i][$j]; ?></td>

                        <?php
                        }
                        else{?>
                            <td><?php echo $matriz[$i][$j]; ?></td>
                        <?php
                        }
                        ?>
                        
                    <?php endfor; ?>
                </tr>
            <?php endfor; ?>
        </table>
    <?php endif; ?>
</body>
</html>

    
