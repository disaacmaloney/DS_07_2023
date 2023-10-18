<?php
    require_once('modelo.php');

    class votos extends modeloCredencialesBD{

        public function __construct(){
            parent::__construct();
        }

        public function listar_votos(){
            $instruccion = "call SP_LISTAR_VOTOS()";
            
            $consulta = $this->_db->query($instruccion);
            $resultado = $consulta->fetch_all(MYSQLI_ASSOC);

            if(!$resultado){
                echo "Error al consultar los votos";
            }
            else{
                return $resultado;
                $resultado->close();
                $this->_db->close();
            }
        }

        public function actualizar_votos($voto1, $voto2){
            $instruccion = "call SP_ACTUALIZAR_VOTOS('" .$voto1."','" .$voto2."')";
            $actualizar = $this->_db->query($instruccion);
            
            if($actualizar){
                return $actualizar;
                $resactualizarultado->close();
                $this->_db->close();
            }
            else{
                echo "Error al actualizar los votos";
            }
        }
    }
?>