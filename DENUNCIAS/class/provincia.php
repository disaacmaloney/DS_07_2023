<?php
    require_once('model.php');

    class Provincia extends modeloCredencialesBD{
        public function __construct(){
            parent::__construct();
        }

        public function ProvinciaBuscar(){
            $instruccion = "select id_provincia , nombre_provincia from provincia; ";
            
            $consulta = $this->_db->query($instruccion);
            $resultado = $consulta->fetch_all(MYSQLI_ASSOC);

            if($resultado){
                $consulta->close();
                $this->_db->close();
                return $resultado;
            }
        }

        
    }