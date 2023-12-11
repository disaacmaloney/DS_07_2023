<?php
    require_once('../../config/model.php');

    class Users extends modeloCredencialesBD{

        public function __construct(){
            parent::__construct();
        }

        public function GetUsers(){
            $instruccion = "CALL SP_USER()";
            
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

        public function GetUsersByRole($ID_ROLE){
            $instruccion = "CALL SP_USER_GET_BY_ROLE('". $ID_ROLE ."')";
            
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

        public function PostUsers($USER_NAME, $USE_PASSWORD,$USE_USER, $USE_LASTNAME, $USE_DATE_BIRTH, $ID_GENDER, $ID_ROLE){
            $instruccion = "CALL SP_USER_NEW('". $USER_NAME  ."','". $USE_PASSWORD  ."','". $USE_USER  ."','".  $USE_LASTNAME  ."','".  $USE_DATE_BIRTH  ."','".  $ID_GENDER  ."','".  $ID_ROLE ."')";
            
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
?>