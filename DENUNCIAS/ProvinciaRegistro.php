<?php
    include_once('Principales/header.php');
    require_once("class/Provincia.php");

    if(array_key_exists('frmRegistrar', $_POST)) { 
        $nombre_provincia = $_POST['nombre_provincia'];
        $objProvincia = new Provincia();
        $objProvincia->ProvinciaInsertar($nombre_provincia);    
    }
?>

<h2>Provincia</h2>

<div class="table-data">
	<div class="order">
		<div class="head">
			<h3>Registro de Provincia</h3>
		</div>
        <form action="ProvinciaRegistro.php" method="post">
            <label for="nombre_provincia">Nombre</label>
            <input type="text" name="nombre_provincia">
            <br>
            <input type="submit" class="btn-download" name="frmRegistrar" value="Registrar">
        </form>
       
	</div>
</div>