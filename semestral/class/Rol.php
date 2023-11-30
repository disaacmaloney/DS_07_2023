<?php
    require_once('./config/model.php');

    class Role extends modeloCredencialesBD{
            
            public function __construct(){
                parent::__construct();
            }
    
            public function GetRoles(){
                $instruccion = "CALL SP_ROLE()";
                
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
    
            public function PostRoles($ROLE_NAME){
                $instruccion = "CALL SP_ROLE_NEW('". $ROLE_NAME ."');";
                
                $consulta = $this->_db->query($instruccion);
                $resultado = $consulta->fetch_all(MYSQLI_ASSOC);
    
                if(!$resultado){
                    echo "Error al consultar las noticias ";
                }
                else{
                    return $resultado;
                    $consulta->close();
                    $this->_db->close();
                }
            }
    }