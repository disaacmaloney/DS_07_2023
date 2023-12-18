<?php
    require_once('model.php');

    class Estados extends modeloCredencialesBD{
        public function __construct(){
            parent::__construct();
        }

        public function EstadosBuscar(){
            $instruccion = "select id_estado,nombre_estado from estado; ";
            
            $consulta = $this->_db->query($instruccion);
            $resultado = $consulta->fetch_all(MYSQLI_ASSOC);

            if($resultado){
                $consulta->close();
                $this->_db->close();
                return $resultado;
            }
        }

        public function EstadoEliminar($id_estado){
            $instruccion = "delete from estado where id_estado = $id_estado; ";
            
            $consulta = $this->_db->query($instruccion);

        }

        public function EstadoInsertar($nombre_estado){
            $instruccion = "insert into estado(nombre_estado) values ('$nombre_estado'); ";
            
            $consulta = $this->_db->query($instruccion);
        }

        public function EstadosBuscarId($id_estado){
            $instruccion = "select id_estado,nombre_estado from estado where id_estado = $id_estado; ";
            
            $consulta = $this->_db->query($instruccion);
            $resultado = $consulta->fetch_all(MYSQLI_ASSOC);

            if($resultado){
                $consulta->close();
                $this->_db->close();
                return $resultado;
            }
        }
        
        public function EstadosModificar($id_estado, $nombre_estado){
            $instruccion = "update estado set nombre_estado = '$nombre_estado' where id_estado = $id_estado; ";
            
            $consulta = $this->_db->query($instruccion);
        }
            
    }