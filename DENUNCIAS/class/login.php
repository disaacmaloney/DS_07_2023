<?php
    require_once('model.php');

    class Login extends modeloCredencialesBD{
        public function __construct(){
            parent::__construct();
        }

        public function login($USER, $PASSWORD){
            $instruccion = "Select * from usuario where usuario = '" . $USER . "' and contrasena = '". $PASSWORD ."'; ";
            
            $consulta = $this->_db->query($instruccion);
            $resultado = $consulta->fetch_all(MYSQLI_ASSOC);

            if($resultado){
                $consulta->close();
                $this->_db->close();
                return $resultado;
            }
        }
    }