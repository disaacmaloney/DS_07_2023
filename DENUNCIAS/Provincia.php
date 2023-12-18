<?php
    include_once('Principales/header.php');

    require_once("class/Provincia.php");
    $objProvincia = new Provincia();
    $resultProvincia = $objProvincia->ProvinciaBuscar(); 
?>

<h2>Provincia</h2>

<div class="table-data">
	<div class="order">
		<div class="head">
			<h3>Consulta de Provincia</h3>
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
                    foreach($resultProvincia as $key => $value){
                        echo "<tr>";
                        echo "<td>".$value['id_provincia']."</td>";
                        echo "<td>".$value['nombre_provincia']."</td>";
                        echo "</tr>";
                    }
                ?>            
        </table>
	</div>
</div>