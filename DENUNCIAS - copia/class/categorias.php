<?php
    require_once('model.php');

    class Categorias extends modeloCredencialesBD{
        public function __construct(){
            parent::__construct();
        }

        public function CategoriasBuscar(){
            $instruccion = "select id_categoria,nombre_categoria, EntidadResponsable,Correo from categoria; ";
            
            $consulta = $this->_db->query($instruccion);
            $resultado = $consulta->fetch_all(MYSQLI_ASSOC);

            if($resultado){
                $consulta->close();
                $this->_db->close();
                return $resultado;
            }
        }


            
    }