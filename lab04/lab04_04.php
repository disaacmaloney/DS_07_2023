<?php
    if(array_key_exists("genNumPar", $_POST))
    {
        $genNumPar = $_REQUEST["cantidadNum"];
        //var_dump($genNumPar);

        $arregloPares = array();
            
        function esPar($numero)
        {
            return $numero % 2 == 0;
        }

        $contador = 0;
    
        while ($contador < $genNumPar ) {

            $numero = rand(1, ($genNumPar * 10) );
            $numeroPar = esPar($numero);
            if($numeroPar == 1 && !in_array($numero, $arregloPares)){
                $arregloPares[] = $numero;
                $contador++;
            }
        }
    
        echo "Arreglo de números pares: ";
        echo "<br> ";
        echo "Posición  - Valor <br> ";
        for($i = 0; $i < count($arregloPares); $i++){
            if($i < 9){
                echo  "0".($i+1) . " - " .$arregloPares[$i] . " ";

            }
            else
            {
                echo  ($i+1) . "  - " .$arregloPares[$i] . " ";
            }
            
            echo "<br> ";
        }

    }