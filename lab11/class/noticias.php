<?php
    require_once('modelo.php');

    class noticias extends modeloCredencialesBD{
        protected $TITULO;
        protected $TEXTO;
        protected $CATEGORIA;
        protected $FECHA;
        protected $IMAGEN;

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

        
        public function consultarNoticiasLimit($INT_START, $INT_LIMIT_COUNT){
            $instruccion = "call SP_LISTAR_NOTICIAS_LIMIT(".$INT_START.", ".$INT_LIMIT_COUNT.")";
            
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