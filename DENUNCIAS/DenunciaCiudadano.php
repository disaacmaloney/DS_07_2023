<?php
    include_once('Principales/header.php');

    require_once("class/Ciudadano.php");
    $objCiudadano = new Ciudadano();
    $resultCiudadano = $objCiudadano->CiudadanoBuscar();

    if(array_key_exists('frmBuscar', $_POST)) { 
        $id_ciudadano = $_POST['id_ciudadano'];

        require_once("class/Denuncia.php");
        $objTasks = new Denuncia();
        $resultDenuncia = $objTasks->DenunciaBuscarCiudadano($id_ciudadano); 
    }
?>

<h2>Denuncia</h2>

<div class="table-data">
    <div class="order">
        <div class="head">
            <h3>Consulta de Denuncia por ciudadano</h3>
        </div>

        <?php
        if (!isset($resultDenuncia)) {
            ?>
            <form action="DenunciaCiudadano.php" method="post">
                <table>
                    <thead>
                        <tr>
                            <td></td>
                            <td>Cedula</td>
                            <td>Nombre</td>
                            <td>Direccion</td>
                            <td>Telefono</td>
                            <td>Correo</td>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                            foreach($resultCiudadano as $key => $value){
                                echo "<tr>";
                                echo "<td><input type='radio' name='id_ciudadano' value='".$value['id_ciudadano']."'></td>";
                                echo "<td>".$value['id_ciudadano']."</td>";
                                echo "<td>".$value['nombre_ciudadano']."</td>";
                                echo "<td>".$value['Lugar_reside']."</td>";
                                echo "<td>".$value['Telefono']."</td>";
                                echo "<td>".$value['Correoelectronico']."</td>";
                                echo "</tr>";
                            }
                        ?>            
                </table>
                <input type="submit" class="btn-download" name="frmBuscar" value="Modificar">
            </form>
        <?php
        }else{
            ?>

<table>
            <thead>
                <tr>
                    <td>Id</td>
                    <td>Fecha</td>
                    <td>Descripcion</td>
                    <td>Provincia</td>
                    <td>Ciudadano</td>
                    <td>Categoría</td>
                </tr>
            </thead>
            <tbody>
                <?php
                    if(isset($resultDenuncia)){
                        foreach($resultDenuncia as $key => $value){
                            echo "<tr>";
                            echo "<td>".$value['id_denuncia']."</td>";
                            echo "<td>".$value['au_date']."</td>";
                            echo "<td>".$value['descripcion']."</td>";
                            echo "<td>".$value['nombre_provincia']."</td>";
                            echo "<td>".$value['nombre_ciudadano']."</td>";
                            echo "<td>".$value['nombre_categoria']."</td>";
                            echo "</tr>";
                        }
                    }
                ?>
            </tbody>
        </table>
        <?php

        }
        ?>
        