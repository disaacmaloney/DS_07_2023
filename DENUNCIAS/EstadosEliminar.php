<?php
    include_once('Principales/header.php');

    require_once("class/Estados.php");

    if(array_key_exists('frmEliminar', $_POST)) { 
        $id_estado = $_POST['id_estado'];
      
        $objEliEstados = new Estados();
        $objEliEstados->EstadoEliminar($id_estado); 
    }

    $objEstados = new Estados();
    $resultEstados = $objEstados->EstadosBuscar();

?>

<h2>Estados</h2>

<div class="table-data">
    <div class="order">
        <div class="head">
            <h3>Consulta de Estados</h3>
        </div>
        <form action="EstadosEliminar.php" method="post">
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
        <input type="submit" class="btn-download" name="frmEliminar" value="Eliminar">
    </form>
    </div>