<?php
    require_once('../../config/model.php');

    class ParameterCE extends modeloCredencialesBD{
            
        public function __construct(){
            parent::__construct();
        }
    
        public function GetGender(){
            $instruccion = "CALL SP_GENDER_GET()";
            
            $consulta = $this->_db->query($instruccion);
            $resultado = $consulta->fetch_all(MYSQLI_ASSOC);
    
            if(!$resultado){
                echo "Error al consultar las noticias";
            }
            else{
                return $resultado;
                $consulta->close();
                $this->_db->close();
            }
        }
    
    }