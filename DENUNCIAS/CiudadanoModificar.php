<?php
    include_once('Principales/header.php');
    require_once("class/Ciudadano.php");

    if(array_key_exists('frmBuscar', $_POST)){
        $id_ciudadano = $_POST['id_ciudadano'];
        $objCiudadano = new Ciudadano();
        $resultCiudadanoById = $objCiudadano->CiudadanoBuscarById($id_ciudadano);
    }
    if(array_key_exists('frmModificar', $_POST)){
        $id_ciudadano = $_POST['id_ciudadano'];
        $nombre_ciudadano = $_POST['nombre_ciudadano'];
        $Lugar_reside = $_POST['Lugar_reside'];
        $Telefono = $_POST['Telefono'];
        $Correoelectronico = $_POST['Correoelectronico'];
        $objCiudadanoActu = new Ciudadano();
        $objCiudadanoActu->CiudadanoModificar($id_ciudadano, $nombre_ciudadano,$Lugar_reside,$Telefono,$Correoelectronico);
    }

    $objCiudadano = new Ciudadano();
    $resultCiudadano = $objCiudadano->CiudadanoBuscar();

?>

<h2>Ciudadano</h2>

<div class="table-data">
    <div class="order">
        <div class="head">
            <h3>Modificar Ciudadano</h3>
        </div>
    <?php
        if(!isset($resultCiudadanoById)){
    ?>
        <form action="CiudadanoModificar.php" method="post">
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
            echo "<form action='CiudadanoModificar.php' method='post'>";
            echo "<label for='nombre_ciudadano'>Nombre</label>";
            echo "<input type='text' name='nombre_ciudadano' value='".$resultCiudadanoById[0]['nombre_ciudadano']."'>";
            echo "<br>";
            echo "<label for='Lugar_reside'>Lugar Reside</label>";
            echo "<input type='text' name='Lugar_reside' value='".$resultCiudadanoById[0]['Lugar_reside']."'>";
            echo "<br>";
            echo "<label for='Telefono'>Telefono</label>";
            echo "<input type='text' name='Telefono' value='".$resultCiudadanoById[0]['Telefono']."'>";
            echo "<br>";
            echo "<label for='Correoelectronico'>Correo Electronico</label>";
            echo "<input type='text' name='Correoelectronico' value='".$resultCiudadanoById[0]['Correoelectronico']."'>";
            echo "<br>";
            echo "<input type='hidden' name='id_ciudadano' value='".$resultCiudadanoById[0]['id_ciudadano']."'>";
            echo "<input type='submit' class='btn-download' name='frmModificar' value='Modificar'>";
            echo "</form>";
        }
    ?>
    </div>
</div>