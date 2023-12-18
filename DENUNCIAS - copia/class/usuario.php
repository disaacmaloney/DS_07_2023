<?php
    require_once('model.php');

    class Usuario extends modeloCredencialesBD{
        public function __construct(){
            parent::__construct();
        }

        public function UsuarioBuscar($cedula){
            $instruccion = "Select * from usuario where cedula = '" . $cedula . "'; ";
            
            $consulta = $this->_db->query($instruccion);
            $resultado = $consulta->fetch_all(MYSQLI_ASSOC);

            if($resultado){
                $consulta->close();
                $this->_db->close();
                return $resultado;
            }
        }
    }