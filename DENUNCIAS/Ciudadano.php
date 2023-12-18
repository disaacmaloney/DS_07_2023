<?php
    include_once('Principales/header.php');

    require_once("class/Ciudadano.php");
    $objCiudadano = new Ciudadano();
    $resultCiudadano = $objCiudadano->CiudadanoBuscar();
?>

<h2>Ciudadano</h2>

<div class="table-data">
    <div class="order">
        <div class="head">
            <h3>Consulta de Ciudadano</h3>
        </div>
        <table>
            <thead>
                <tr>
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
                        echo "<td>".$value['id_ciudadano']."</td>";
                        echo "<td>".$value['nombre_ciudadano']."</td>";
                        echo "<td>".$value['Lugar_reside']."</td>";
                        echo "<td>".$value['Telefono']."</td>";
                        echo "<td>".$value['Correoelectronico']."</td>";
                        echo "</tr>";
                    }
                ?>            
        </table>
    </div>