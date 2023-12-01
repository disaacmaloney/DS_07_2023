<?php
    require_once('model.php');

    class Factorial extends modeloCredencialesBD{

        public function __construct(){
            parent::__construct();
        }

        public function GetFactorial(){
            $instruccion = "CALL SP_FACTORIAL_GET()";
            
            $consulta = $this->_db->query($instruccion);
            $resultado = $consulta->fetch_all(MYSQLI_ASSOC);

            if(!$resultado){
                echo "Error al consultar las noticias";
            }
            else{
                $consulta->close();  
                $this->_db->close(); 
                return $resultado;
            }
        }

        public function PostFactorial($numFactorial){
            $instruccion = "CALL SP_FACTORIAL_POST(" . $numFactorial . ")";
            
            $consulta = $this->_db->query($instruccion);
            $resultado = $consulta->fetch_all(MYSQLI_ASSOC);

            if(!$resultado){
                echo "Error al consultar las noticias";
            }
            else{
                $consulta->close();  
                $this->_db->close(); 
                return $resultado;
            }
        }
    }