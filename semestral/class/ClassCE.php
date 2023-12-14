<?php
    require_once('../../config/model.php');

    class ClassCE extends modeloCredencialesBD{

        public function __construct(){
            parent::__construct();
        }

        public function GetClass(){
            $instruccion = "CALL SP_CLASS_GET()";
            
            $consulta = $this->_db->query($instruccion);
            $resultado = $consulta->fetch_all(MYSQLI_ASSOC);

            if(!$resultado){
                echo "Error al consultar las noticias";
            }
            else{
                return $resultado;
                $consulta->close();
                $this->_db->close();
            }
        }

        public function GetClassByTeacher($ID_TEACHER){
            $instruccion = "CALL SP_CLASS_GET_BY_TEACHER('". $ID_TEACHER ."')";
            
            $consulta = $this->_db->query($instruccion);
            $resultado = $consulta->fetch_all(MYSQLI_ASSOC);

            if(!$resultado){
                echo "Error al consultar las noticias";
            }
            else{
                return $resultado;
                $consulta->close();
                $this->_db->close();
            }
        }

        public function PostClass($CLA_NAME, $CLA_COD){
            $instruccion = "CALL SP_CLASS_NEW('". $CLA_NAME  ."','". $CLA_COD  ."')";
            
            $consulta = $this->_db->query($instruccion);
            $resultado = $consulta->fetch_all(MYSQLI_ASSOC);

            if(!$resultado){
                echo "Error al consultar las noticias ";
            }
            else{
                return $resultado;
                $consulta->close();
                $this->_db->close();
            }
        }
    }