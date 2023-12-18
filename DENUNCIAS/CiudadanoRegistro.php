<?php
    include_once('Principales/header.php');
    require_once("class/Ciudadano.php");

    if(array_key_exists('frmRegistrar', $_POST)) { 
        $nombre_ciudadano = $_POST['nombre_ciudadano'];
        $cedula_ciudadano = $_POST['cedula_ciudadano'];
        $direccion_ciudadano = $_POST['direccion_ciudadano'];
        $telefono_ciudadano = $_POST['telefono_ciudadano'];
        $correo_ciudadano = $_POST['correo_ciudadano'];
        $objCiudadano = new Ciudadano();
        $objCiudadano->CiudadanoInsertar($cedula_ciudadano, $nombre_ciudadano, $direccion_ciudadano, $telefono_ciudadano, $correo_ciudadano);    
    }


?>

<h2>Ciudadano</h2>

<div class="table-data">
	<div class="order">
		<div class="head">
			<h3>Registro de Ciudadano</h3>
        </div>
        <form action="CiudadanoRegistro.php" method="post">
            <label for="nombre_ciudadano">Nombre</label>
            <input type="text" name="nombre_ciudadano">
            <br>
            <label for="cedula_ciudadano">Cedula</label>
            <input type="text" name="cedula_ciudadano">
            <br>
            <label for="direccion_ciudadano">Direccion</label>
            <input type="text" name="direccion_ciudadano">
            <br>
            <label for="telefono_ciudadano">Telefono</label>
            <input type="text" name="telefono_ciudadano">
            <br>
            <label for="correo_ciudadano">Correo</label>
            <input type="text" name="correo_ciudadano">
            <br>

            <input type="submit" class="btn-download" name="frmRegistrar" value="Registrar">
        </form>
    </div>
</div>
