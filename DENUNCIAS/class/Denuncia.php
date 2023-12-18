<?php
    require_once('model.php');

    class Denuncia extends modeloCredencialesBD{
        public function __construct(){
            parent::__construct();
        }

        public function DenunciaNew($au_cedula, $au_categoria, $au_provincia , $au_descript , $au_date , $au_lugar ){
            $instruccion = "INSERT INTO denuncia (id_ciudadano,categoria_id,provincia_id,descripcion,au_date,au_lugar, au_estatus ) VALUES ('" . $au_cedula . "','" . $au_categoria . "','" . $au_provincia . "','" . $au_descript . "','" . $au_date . "','" . $au_lugar . "', 'Nueva'); ";
            echo $instruccion;
            $consulta = $this->_db->query($instruccion);
        }

        public function DenunciaBuscar(){
            $instruccion = "SELECT DE.id_denuncia, DE.descripcion, DE.au_date, DE.au_estatus, DE.au_lugar
            , CI.id_ciudadano, CI.nombre_ciudadano, CI.Lugar_reside, CI.Telefono, CI.Correoelectronico
            , PR.nombre_provincia
            , CA.nombre_categoria
            FROM denuncia DE
            INNER JOIN ciudadano CI ON CI.id_ciudadano = DE.id_ciudadano
            INNER JOIN PROVINCIA PR ON PR.id_provincia = DE.provincia_id
            INNER JOIN CATEGORIA CA ON CA.id_categoria = DE.categoria_id;";
            $consulta = $this->_db->query($instruccion);           
            $resultado = $consulta->fetch_all(MYSQLI_ASSOC);
            return $resultado;
        }

        public function DenunciaBuscarCategoria($au_categoria){
            $instruccion = "SELECT DE.id_denuncia, DE.descripcion, DE.au_date, DE.au_estatus, DE.au_lugar
            , CI.id_ciudadano, CI.nombre_ciudadano, CI.Lugar_reside, CI.Telefono, CI.Correoelectronico
            , PR.nombre_provincia
            , CA.nombre_categoria
            FROM denuncia DE
            INNER JOIN ciudadano CI ON CI.id_ciudadano = DE.id_ciudadano
            INNER JOIN PROVINCIA PR ON PR.id_provincia = DE.provincia_id
            INNER JOIN CATEGORIA CA ON CA.id_categoria = DE.categoria_id
            WHERE CA.id_categoria = '" . $au_categoria . "';";
            $consulta = $this->_db->query($instruccion);           
            $resultado = $consulta->fetch_all(MYSQLI_ASSOC);
            return $resultado;
        }

        public function DenunciaBuscarProvincia($au_categoria){
            $instruccion = "SELECT DE.id_denuncia, DE.descripcion, DE.au_date, DE.au_estatus, DE.au_lugar
            , CI.id_ciudadano, CI.nombre_ciudadano, CI.Lugar_reside, CI.Telefono, CI.Correoelectronico
            , PR.nombre_provincia
            , CA.nombre_categoria
            FROM denuncia DE
            INNER JOIN ciudadano CI ON CI.id_ciudadano = DE.id_ciudadano
            INNER JOIN PROVINCIA PR ON PR.id_provincia = DE.provincia_id
            INNER JOIN CATEGORIA CA ON CA.id_categoria = DE.categoria_id
            WHERE PR.id_provincia = '" . $au_categoria . "';";
            $consulta = $this->_db->query($instruccion);           
            $resultado = $consulta->fetch_all(MYSQLI_ASSOC);
            return $resultado;
        }

        public function DenunciaBuscarPorId($au_categoria){
            $instruccion = "SELECT DE.id_denuncia, DE.descripcion, DE.au_date, DE.au_estatus, DE.au_lugar
            , CI.id_ciudadano, CI.nombre_ciudadano, CI.Lugar_reside, CI.Telefono, CI.Correoelectronico
            , PR.nombre_provincia
            , CA.nombre_categoria
            FROM denuncia DE
            INNER JOIN ciudadano CI ON CI.id_ciudadano = DE.id_ciudadano
            INNER JOIN PROVINCIA PR ON PR.id_provincia = DE.provincia_id
            INNER JOIN CATEGORIA CA ON CA.id_categoria = DE.categoria_id
            WHERE DE.id_denuncia = '" . $au_categoria . "';";
            $consulta = $this->_db->query($instruccion);           
            $resultado = $consulta->fetch_all(MYSQLI_ASSOC);
            return $resultado;
        }

        public function DenunciaModificar($idDenuncia, $au_descripcion, $au_date, $au_estatus, $au_lugar, $au_provincia, $au_categoria){
            $instruccion = "update denuncia set descripcion = '" . $au_descripcion . "', au_date = '" . $au_date . "', au_estatus = '" . $au_estatus . "', au_lugar = '" . $au_lugar . "', provincia_id = '" . $au_provincia . "', categoria_id = '" . $au_categoria . "' where id_denuncia = '" . $idDenuncia . "';";
            $consulta = $this->_db->query($instruccion);           
        }

        public function DenunciaBuscarCiudadano($au_categoria){
            $instruccion = "SELECT DE.id_denuncia, DE.descripcion, DE.au_date, DE.au_estatus, DE.au_lugar
            , CI.id_ciudadano, CI.nombre_ciudadano, CI.Lugar_reside, CI.Telefono, CI.Correoelectronico
            , PR.nombre_provincia
            , CA.nombre_categoria
            FROM denuncia DE
            INNER JOIN ciudadano CI ON CI.id_ciudadano = DE.id_ciudadano
            INNER JOIN PROVINCIA PR ON PR.id_provincia = DE.provincia_id
            INNER JOIN CATEGORIA CA ON CA.id_categoria = DE.categoria_id
            WHERE CI.id_ciudadano  = '" . $au_categoria . "';";
            $consulta = $this->_db->query($instruccion);           
            $resultado = $consulta->fetch_all(MYSQLI_ASSOC);
            return $resultado;
        }
        public function DenunciaCambiarEstado($au_categoria, $estado){
            $instruccion = "UPDATE denuncia SET au_estatus = '" . $estado . "' WHERE id_denuncia = '" . $au_categoria . "';";
            $consulta = $this->_db->query($instruccion);           
        }

        public function DenunciaEliminar($au_categoria){
            $instruccion = "DELETE FROM denuncia WHERE id_denuncia = '" . $au_categoria . "';";
            $consulta = $this->_db->query($instruccion);           
        }
    }
?>