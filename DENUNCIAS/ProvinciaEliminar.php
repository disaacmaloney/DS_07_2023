<?php
    include_once('Principales/header.php');
    require_once("class/Provincia.php");

    if(array_key_exists('frmEliminar', $_POST)) { 
        $id_provincia = $_POST['id_provincia'];
      
        $objProvincia = new Provincia();
        $objProvincia->ProvinciaEliminar($id_provincia); 
    }

    $objProvincia = new Provincia();
    $resultProvincia = $objProvincia->ProvinciaBuscar(); 
?>

<h2>Provincia</h2>

<div class="table-data">
	<div class="order">
		<div class="head">
			<h3>Eliminar Provincia</h3>
		</div>
        <form action="ProvinciaEliminar.php" method="post">
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
                    foreach($resultProvincia as $key => $value){
                        echo "<tr>";
                        echo "<td><input type='radio' name='id_provincia' value='".$value['id_provincia']."'></td>";
                        echo "<td>".$value['id_provincia']."</td>";
                        echo "<td>".$value['nombre_provincia']."</td>";
                        echo "</tr>";
                    }
                ?>            
        </table>
        <input type="submit" class="btn-download" name="frmEliminar" value="Eliminar">
        </form>
	</div>
</div>