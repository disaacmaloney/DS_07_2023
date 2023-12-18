<?php
    include_once('Principales/header.php');

    require_once("class/Categorias.php");
    $objCategorias = new Categorias();
    $resultCategorias = $objCategorias->CategoriasBuscar(); 
?>

<h2>Categorias</h2>

<div class="table-data">
	<div class="order">
		<div class="head">
			<h3>Consulta de Categorias</h3>
		</div>
        <table>
            <thead>
                <tr>
                    <td>Id</td>
                    <td>Nombre</td>
                    <td>Entidad Responsable</td>
                    <td>Correo</td>
                </tr>
            </thead>
            <tbody>
                <?php
                    foreach($resultCategorias as $key => $value){
                        echo "<tr>";
                        echo "<td>".$value['id_categoria']."</td>";
                        echo "<td>".$value['nombre_categoria']."</td>";
                        echo "<td>".$value['EntidadResponsable']."</td>";
                        echo "<td>".$value['Correo']."</td>";
                        echo "</tr>";
                    }
                ?>            
        </table>
	</div>
</div>