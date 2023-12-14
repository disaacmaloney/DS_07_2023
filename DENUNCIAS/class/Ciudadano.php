<?php
    require_once('model.php');

    class Ciudadano extends modeloCredencialesBD{
        public function __construct(){
            parent::__construct();
        }

        public function CiudadanoBuscar($cedula){
            $instruccion = "Select id_ciudadano,nombre_ciudadano,Lugar_reside,Telefono,Correoelectronico  from ciudadano where id_ciudadano = '" . $cedula . "'; ";
            
            $consulta = $this->_db->query($instruccion);
            $resultado = $consulta->fetch_all(MYSQLI_ASSOC);

            if($resultado){
                $consulta->close();
                $this->_db->close();
                return $resultado;
            }
        }

        public function CiudadanoNew($au_cedula, $au_name, $au_residencia, $au_tlf, $au_email){
            $instruccion = "INSERT INTO ciudadano (id_ciudadano,nombre_ciudadano,Lugar_reside,Telefono,Correoelectronico) VALUES ('" . $au_cedula . "','" . $au_name . "','" . $au_residencia . "','" . $au_tlf . "','" . $au_email . "'); ";
            
            $consulta = $this->_db->query($instruccion);
        }

            
    }