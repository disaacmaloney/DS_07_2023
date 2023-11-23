<?php
    require_once('modelo.php');

    class usuarios extends modeloCredencialesBD{

        public function __construct(){
            parent::__construct();
        }

        public function validarUsuario($usuario, $clave){
            $instruccion = "call SP_VALIDAR_USUARIO('" . $usuario . "', '" . $clave . "')";
            
            echo $instruccion;
            $consulta = $this->_db->query($instruccion);
            $resultado = $consulta->fetch_all(MYSQLI_ASSOC);

            if(!$resultado){
                echo "Error al consultar las noticias";
            }
            else{                
                $this->_db->close();
                return $resultado;
            }
        }
    }
?>