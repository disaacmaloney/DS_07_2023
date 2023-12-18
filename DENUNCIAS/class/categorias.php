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

        public function CategoriaEliminar($id_categoria){
            $instruccion = "delete from categoria where id_categoria = $id_categoria; ";
            
            $consulta = $this->_db->query($instruccion);

        }

        public function CategoriaInsertar($nombre_categoria,$EntidadResponsable,$Correo){
            $instruccion = "insert into categoria(nombre_categoria,EntidadResponsable,Correo) values ('$nombre_categoria','$EntidadResponsable','$Correo'); ";
            
            $consulta = $this->_db->query($instruccion);
        }

        public function CategoriasBuscarId($id_categoria){
            $instruccion = "select id_categoria,nombre_categoria, EntidadResponsable,Correo from categoria where id_categoria = $id_categoria; ";
            
            $consulta = $this->_db->query($instruccion);
            $resultado = $consulta->fetch_all(MYSQLI_ASSOC);

            if($resultado){
                $consulta->close();
                $this->_db->close();
                return $resultado;
            }
        }
        
        public function CategoriasModificar($id_categoria, $nombre_categoria,$EntidadResponsable,$Correo){
            $instruccion = "update categoria set nombre_categoria = '$nombre_categoria', EntidadResponsable = '$EntidadResponsable', Correo = '$Correo' where id_categoria = $id_categoria; ";
            
            $consulta = $this->_db->query($instruccion);
        }
            
    }