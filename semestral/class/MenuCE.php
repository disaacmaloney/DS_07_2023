<?php
    require_once('../../config/model.php');

    class MenuCE extends modeloCredencialesBD{
        
        public function __construct(){
            parent::__construct();
        }

        public function GetMenu(){
            $instruccion = "CALL SP_GET_MENU();";
            
            $consulta = $this->_db->query($instruccion);
            $resultado = $consulta->fetch_all(MYSQLI_ASSOC);

            if($resultado){
                $consulta->close();
                $this->_db->close();
                return $resultado;
            }
        }

        public function GetSubMenu($idRole, $idMenu){
            $instruccion = "CALL SP_GET_SUBMENU($idRole, $idMenu);";
            
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