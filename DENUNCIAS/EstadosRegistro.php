<?php
    include_once('Principales/header.php');
    require_once("class/Estados.php");

    if(array_key_exists('frmRegistrar', $_POST)) { 
        $nombre_estado = $_POST['nombre_estado'];
        $objEstados = new Estados();
        $objEstados->EstadoInsertar($nombre_estado);    
    }
?>

<h2>Estados</h2>

<div class="table-data">
    <div class="order">
        <div class="head">
            <h3>Rergistrar Estados</h3>
        </div>
        <form action="EstadosRegistro.php" method="post">
            <label for="nombre_estado">Nombre</label>
            <input type="text" name="nombre_estado">
            <br>
            <input type="submit" class="btn-download" name="frmRegistrar" value="Registrar">
        </form>
    </div>
</div>
