<?php
    include_once('Principales/header.php');

    require_once("class/Ciudadano.php");
    $objCiudadano = new Ciudadano();
    $resultCiudadano = $objCiudadano->CiudadanoBuscar();

    if(array_key_exists('frmEliminar', $_POST)) { 
        $id_ciudadano = $_POST['id_ciudadano'];
        $objCiudadano = new Ciudadano();
        $objCiudadano->CiudadanoEliminar($id_ciudadano);    
    }
?>

<h2>Ciudadano</h2>

<div class="table-data">
    <div class="order">
    <form action="CiudadanoEliminar.php" method="post">

        <div class="head">
            <h3>Eliminar Ciudadano</h3>
        </div>
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
        <input type="submit" class="btn-download" name="frmEliminar" value="Eliminar">
    </form>
    </div>
</div>