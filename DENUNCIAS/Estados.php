<?php
    include_once('Principales/header.php');

    require_once("class/Estados.php");
    $objEstados = new Estados();
    $resultEstados = $objEstados->EstadosBuscar();
?>

<h2>Estados</h2>

<div class="table-data">
    <div class="order">
        <div class="head">
            <h3>Consulta de Estados</h3>
        </div>
        <table>
            <thead>
                <tr>
                    <td>Id</td>
                    <td>Nombre</td>
                </tr>
            </thead>
            <tbody>
                <?php
                    foreach($resultEstados as $key => $value){
                        echo "<tr>";
                        echo "<td>".$value['id_estado']."</td>";
                        echo "<td>".$value['nombre_estado']."</td>";
                        echo "</tr>";
                    }
                ?>            
        </table>
    </div>
</div>