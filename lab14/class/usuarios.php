<?php
    require_once('modelo.php');

    class usuarios extends modeloCredencialesBD{

        public function __construct(){
            parent::__construct();
        }

        public function consultarNoticias(){
            $instruccion = "call SP_LISTAR_NOTICIAS()";
            
            $consulta = $this->_db->query($instruccion);
            $resultado = $consulta->fetch_all(MYSQLI_ASSOC);

            if(!$resultado){
                echo "Error al consultar las noticias";
            }
            else{
                return $resultado;
                $resultado->close();
                $this->_db->close();
            }
        }
    }
?>