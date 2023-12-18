<?php
    include_once('Principales/header.php');
    require_once("class/Categorias.php");

    if(array_key_exists('frmRegistrar', $_POST)) { 
        $nombre_categoria = $_POST['nombre_categoria'];
        $EntidadResponsable = $_POST['EntidadResponsable'];
        $Correo = $_POST['Correo'];
        $objCategorias = new Categorias();
        $objCategorias->CategoriaInsertar($nombre_categoria,$EntidadResponsable,$Correo);    
    }
?>

<h2>Categorias</h2>

<div class="table-data">
    <div class="order">
        <div class="head">
            <h3>Registrar Categorias</h3>
        </div>
        <form action="CategoriaRegistro.php" method="post">
            <label for="nombre_categoria">Nombre</label>
            <input type="text" name="nombre_categoria">
            <br>
            <label for="EntidadResponsable">Entidad Responsable</label>
            <input type="text" name="EntidadResponsable">
            <br>
            <label for="Correo">Correo</label>
            <input type="text" name="Correo">
            <br>
            <input type="submit" class="btn-download" name="frmRegistrar" value="Registrar">
        </form> 
    </div>
</div>