<?php
    include_once('Principales/header.php');

	require_once("class/Ciudadano.php");
    $objCiudadano = new Ciudadano();
    $resultCiudadano = $objCiudadano->CiudadanoBuscar();

	if(array_key_exists('frmBuscar', $_POST)){
        $id_ciudadano = $_POST['id_ciudadano'];
        $objCiudadano = new Ciudadano();
        $resultCiudadanoById = $objCiudadano->CiudadanoBuscarById($id_ciudadano);
    }
?>

<h2>Denuncias</h2>

<div class="table-data">
	<div class="order">
		<div class="head">
			<h3>Registro de denuncias</h3>
		</div>
		<?php
        if(!isset($resultCiudadanoById)){
    ?>
		<form action="DenunciaRegistro.php" method="post">
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
		?>
		
		<form action="DenunciaRegistro.php" method="post">
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
					foreach($resultCiudadanoById as $key => $value){
						echo "<tr>";
						echo "<td><input type='text' name='id_ciudadano' value='".$value['id_ciudadano']."' readonly></td>";
						echo "<td><input type='text' name='nombre_ciudadano' value='".$value['nombre_ciudadano']."'></td>";
						echo "<td><input type='text' name='Lugar_reside' value='".$value['Lugar_reside']."'></td>";
						echo "<td><input type='text' name='Telefono' value='".$value['Telefono']."'></td>";
						echo "<td><input type='text' name='Correoelectronico' value='".$value['Correoelectronico']."'></td>";
						echo "</tr>";
					}
				?>
			</tbody>
		</table>
		<input type="submit" class="btn-download" name="frmModificar" value="Modificar">
		</form>
		<?php
			}
		?>
	</div>
	
</div>