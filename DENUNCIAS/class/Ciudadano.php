<?php
    require_once('model.php');

    class Ciudadano extends modeloCredencialesBD{
        public function __construct(){
            parent::__construct();
        }

        public function CiudadanoBuscar(){
            $instruccion = "Select id_ciudadano,nombre_ciudadano,Lugar_reside,Telefono,Correoelectronico  from ciudadano ; ";
            
            $consulta = $this->_db->query($instruccion);
            $resultado = $consulta->fetch_all(MYSQLI_ASSOC);

            if($resultado){
                $consulta->close();
                $this->_db->close();
                return $resultado;
            }
        }

        public function CiudadanoBuscarById($cedula){
            $instruccion = "Select id_ciudadano,nombre_ciudadano,Lugar_reside,Telefono,Correoelectronico  from ciudadano where id_ciudadano = '" . $cedula . "'; ";
            
            $consulta = $this->_db->query($instruccion);
            $resultado = $consulta->fetch_all(MYSQLI_ASSOC);

            if($resultado){
                $consulta->close();
                $this->_db->close();
                return $resultado;
            }
        }

        public function CiudadanoInsertar($au_cedula, $au_name, $au_residencia, $au_tlf, $au_email){
            $instruccion = "INSERT INTO ciudadano (id_ciudadano,nombre_ciudadano,Lugar_reside,Telefono,Correoelectronico) VALUES ('" . $au_cedula . "','" . $au_name . "','" . $au_residencia . "','" . $au_tlf . "','" . $au_email . "'); ";
            
            $consulta = $this->_db->query($instruccion);
        }

        public function CiudadanoEliminar($au_cedula){
            $instruccion = "DELETE FROM ciudadano WHERE id_ciudadano = '" . $au_cedula . "'; ";
            
            $consulta = $this->_db->query($instruccion);
        }

        public function CiudadanoModificar($au_cedula, $au_name, $au_residencia, $au_tlf, $au_email){
            $instruccion = "UPDATE ciudadano SET nombre_ciudadano = '" . $au_name . "', Lugar_reside = '" . $au_residencia . "', Telefono = '" . $au_tlf . "', Correoelectronico = '" . $au_email . "' WHERE id_ciudadano = '" . $au_cedula . "'; ";
            
            $consulta = $this->_db->query($instruccion);
        }

            
    }