<?php
   require_once('model.php');

   class Provincia extends modeloCredencialesBD{
       public function __construct(){
           parent::__construct();
       }

       public function ProvinciaBuscar(){
           $instruccion = "select id_provincia , nombre_provincia from provincia; ";
           
           $consulta = $this->_db->query($instruccion);
           $resultado = $consulta->fetch_all(MYSQLI_ASSOC);

           if($resultado){
               $consulta->close();
               $this->_db->close();
               return $resultado;
           }
       }
       public function ProvinciaBuscarId($id_provincia){
           $instruccion = "select id_provincia , nombre_provincia from provincia where id_provincia = $id_provincia; ";
           
           $consulta = $this->_db->query($instruccion);
           $resultado = $consulta->fetch_all(MYSQLI_ASSOC);

           if($resultado){
               $consulta->close();
               $this->_db->close();
               return $resultado;
           }
       }

       public function ProvinciaEliminar($id_provincia){
           $instruccion = "delete from provincia where id_provincia = $id_provincia; ";
           
           $consulta = $this->_db->query($instruccion);

       }
       
       public function ProvinciaInsertar($nombre_provincia){
           $instruccion = "insert into provincia (nombre_provincia) values ('$nombre_provincia'); ";
           
           $consulta = $this->_db->query($instruccion);

       }

       public function ProvinciaModificar($id_provincia, $nombre_provincia){
           $instruccion = "update provincia set nombre_provincia = '$nombre_provincia' where id_provincia = $id_provincia; ";
           
           $consulta = $this->_db->query($instruccion);

       }
   }