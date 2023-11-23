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

        public function consularNoticiasFiltro($campo, $valor)
        {
            $instruccion = "call SP_LISTAR_NOTICIAS_FILTRO('" . $campo . "', '" . $valor ."')";
            echo $instruccion;
            $consulta = $this->_db->query($instruccion);
            $resultado = $consulta->fetch_all(MYSQLI_ASSOC);
    
            if ($resultado) {
                return $resultado;
                $consulta->close();
                $this->_db->close();
            }
        }
    }
?>