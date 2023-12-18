<?php
    include_once('Principales/header.php');

    require_once("class/Categorias.php");

    if(array_key_exists('frmEliminar', $_POST)) { 
        $id_categoria = $_POST['id_categoria'];
      
        $objEliCategorias = new Categorias();
        $objEliCategorias->CategoriaEliminar($id_categoria); 
    }

    $objCategorias = new Categorias();
    $resultCategorias = $objCategorias->CategoriasBuscar(); 
?>

<h2>Categorias</h2>

<div class="table-data">
	<div class="order">
		<div class="head">
			<h3>Consulta de Categorias</h3>
		</div>
        <form action="CategoriaEliminar.php" method="post">
        <table>
            <thead>
                <tr>
                    <td></td>
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
                        echo "<td><input type='radio' name='id_categoria' value='".$value['id_categoria']."'></td>";
                        echo "<td>".$value['id_categoria']."</td>";
                        echo "<td>".$value['nombre_categoria']."</td>";
                        echo "<td>".$value['EntidadResponsable']."</td>";
                        echo "<td>".$value['Correo']."</td>";
                        echo "</tr>";
                    }
                ?>            
        </table>
        <input type="submit" class="btn-download" name="frmEliminar" value="Eliminar">
    </form>
	</div>
</div>