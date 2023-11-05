<?php
    if(array_key_exists("calFacto", $_POST)){
        
        $factoo = $_REQUEST["factorial"];
        //var_dump($factoo);
        
        function calFactorial($facto){
            if($facto == 0){
                return 1;
            }else{
                return $facto * calFactorial($facto - 1);
            }
        }
        $factorial = calFactorial($factoo);      
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Laboratoio - 04.02 </title>
</head>
<body>
    <div>
        <h2>Resultado del Factorial</h2>
        <?php if(isset($factorial)){ ?>
            <p>El factorial de <?php echo $factoo; ?> es: <?php echo $factorial; ?></p>
        <?php } else { ?>
            <p>ingrese un número valido </p>
        <?php } ?>

    </div>
</body>
</html>
