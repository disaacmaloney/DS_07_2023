<?php
    require_once('../../config/model.php');

    class LoginCE extends modeloCredencialesBD{
        
        public function __construct(){
            parent::__construct();
        }

        public function Login($user, $password){
            $instruccion = "CALL SP_LOGIN('". $user ."','". $password ."');";
            
            $consulta = $this->_db->query($instruccion);
            $resultado = $consulta->fetch_all(MYSQLI_ASSOC);

            if($resultado){
                $consulta->close();
                $this->_db->close();
                return $resultado;
            }
        }
    }
?>