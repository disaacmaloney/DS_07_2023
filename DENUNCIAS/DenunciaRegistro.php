<?php
    include_once('Principales/header.php');

	require_once("class/Ciudadano.php");
    $objCiudadano = new Ciudadano();
    $resultCiudadano = $objCiudadano->CiudadanoBuscar();

	require_once("class/Categorias.php");
    $objCategorias = new Categorias();
    $resultCategorias = $objCategorias->CategoriasBuscar();

	require_once("class/Provincia.php");
    $objProvincia = new Provincia();
    $resultProvincia = $objProvincia->ProvinciaBuscar(); 

	if(array_key_exists('frmBuscar', $_POST)){
        $id_ciudadano = $_POST['id_ciudadano'];
        $objCiudadano = new Ciudadano();
        $resultCiudadanoById = $objCiudadano->CiudadanoBuscarById($id_ciudadano);
    }

	if(array_key_exists('frmNew', $_POST)){
		$id_ciudadano = $_POST['id_ciudadano'];
		$nombre_ciudadano = $_POST['nombre_ciudadano'];
		$Lugar_reside = $_POST['Lugar_reside'];
		$Telefono = $_POST['Telefono'];
		$Correoelectronico = $_POST['Correoelectronico'];
		$au_categoria = $_POST['au_categoria'];
		$au_provincia = $_POST['au_provincia'];
		$au_descript = $_POST['au_descript'];
		$au_fecha = $_POST['au_fecha'];
		$au_lugar = $_POST['au_lugar'];

		require_once("class/Denuncia.php");
		$objDenuncia = new Denuncia();
		$objDenuncia->DenunciaNew($id_ciudadano,$au_categoria, $au_provincia, $au_descript, $au_fecha, $au_lugar);
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
        <input type="submit" class="btn-download" name="frmBuscar" value="Seleccionar ciudadano">
        </form>
		<?php
			}else{
		?>
		
		<form action="DenunciaRegistro.php" method="post">
			<h3>Información del ciudadano</h3>
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
						echo "<td><input type='text' name='nombre_ciudadano' value='".$value['nombre_ciudadano']."' readonly></td>";
						echo "<td><input type='text' name='Lugar_reside' value='".$value['Lugar_reside']."' readonly></td>";
						echo "<td><input type='text' name='Telefono' value='".$value['Telefono']."' readonly></td>";
						echo "<td><input type='text' name='Correoelectronico' value='".$value['Correoelectronico']."' readonly></td>";
						echo "</tr>";
					}
				?>
			</tbody>
		</table>
		<h3>Información de la denuncia</h3>
			<div>
				<label for="au_categoria">categoría de la denuncia:</label>
				<select name="au_categoria" id="au_categoria" style="appearance: none; width: 100%; height: 100%; background: none; padding: 7px; width: inherit; color: #333;">
					<?php
						foreach($resultCategorias as $categoria){
							echo "<option value='".$categoria['id_categoria']."'>".$categoria['nombre_categoria']."</option>";
						}
					?>
				</select>
				<br>
				<label for="au_provincia">Provincia:</label>
				<select name="au_provincia" id="au_provincia" style="appearance: none; width: 100%; height: 100%; background: none; padding: 7px; width: inherit; color: #333;">
					<?php
						foreach($resultProvincia as $provincia){
							echo "<option value='".$provincia['id_provincia']."'>".$provincia['nombre_provincia']."</option>";
						}
					?>
				</select>
				<br>
				<label for="au_descript">Descripción:</label>
				<input type="text" name="au_descript" id="au_descript">
				<br>
				<label for="au_fecha">Fecha:</label>
				<input type="date" name="au_fecha" id="au_fecha">
				<br>
				<label for="au_lugar">Lugar:</label>
				<input type="text" name="au_lugar" id="au_lugar">
				<br>

				<input type="submit" class="btn-download" name="frmNew" value="Registrar">
			</div>		
		</form>
		<?php
			}
		?>
	</div>
	
</div>