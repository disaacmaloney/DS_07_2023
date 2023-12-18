<?php
    include_once('Principales/header.php');
    require_once("class/Estados.php");

    if(array_key_exists('frmBuscar', $_POST)){
        $id_estado = $_POST['id_estado'];
        $objEstados = new Estados();
        $resultEstadosById = $objEstados->EstadosBuscarId($id_estado);
    }

    if(array_key_exists('frmModificar', $_POST)){
        $id_estado = $_POST['id_estado'];
        $nombre_estado = $_POST['nombre_estado'];
        $objEstadosActu = new Estados();
        $objEstadosActu->EstadosModificar($id_estado, $nombre_estado);
    }

    $objEstados = new Estados();
    $resultEstados = $objEstados->EstadosBuscar();
?>

<h2>Estados</h2>

<div class="table-data">
    <div class="order">
        <div class="head">
            <h3>Modificar Estados</h3>
        </div>
        <?php
        if(!isset($resultEstadosById)){
            ?>
            <form action="EstadosModificar.php" method="post">
        <table>
            <thead>
                <tr>
                    <td></td>
                    <td>Id</td>
                    <td>Nombre</td>
                </tr>
            </thead>
            <tbody>
                
                <?php
                    foreach($resultEstados as $key => $value){
                        echo "<tr>";
                        echo "<td><input type='radio' name='id_estado' value='".$value['id_estado']."'></td>";
                        echo "<td>".$value['id_estado']."</td>";
                        echo "<td>".$value['nombre_estado']."</td>";
                        echo "</tr>";
                    }
                ?>            
        </table>
        <input type="submit" class="btn-download" name="frmBuscar" value="Modificar">
        </form>
        <?php
        }else{
            echo "<form action='EstadosModificar.php' method='post'>";
            echo "<label>Id: </label><input type='text' name='id_estado' value='".$resultEstadosById[0]['id_estado']."' readonly><br>";
            echo "<label>Nombre: </label><input type='text' name='nombre_estado' value='".$resultEstadosById[0]['nombre_estado']."'><br>";
            echo "<input type='submit' class='btn-download' name='frmModificar' value='Modificar'>";
            echo "</form>";
        }
        ?>
    </div>
</div>