<?php
if(array_key_exists('frmBuscar', $_POST)) {
    $miArray = $_POST;
  
    $au_cedula = $_POST['au_cedula'];
	echo $au_cedula;
  
    require_once("class/Ciudadano.php");
    $objTasks = new Ciudadano();
    $resultCiudadano = $objTasks->CiudadanoBuscar($au_cedula);
print_r($resultCiudadano);
  }

?>

<!DOCTYPE html>
<html>
<head>
	<title></title>
	<link rel="stylesheet" href="css/FormNuevaDenuncia2.css">
</head>
<body>
<header>	
	<h1><a href="home.php">Pagina Principal</a></h1>
</header>
<h1>Formulario de registro</h1>

<section id="MainCaja">

	
	<table>
		<?php
			if(!isset($resultCiudadano) && !array_key_exists('frmBuscar', $_POST)){
				echo "<form action='NuevaDenuncia.php' method=post>";
				echo "<tr>";
				echo "<td colspan=2 style='text-align: center;'> Busqueda de ciudadano</td>";
				echo "</tr>";
				echo "<tr>";
				echo "<td> Cédula: </td>";
				echo "<td> <input type='text' name='au_cedula' id='au_cedula' placeholder='Cédula'> </td>";
				echo "</tr>";
				echo "<tr>";
				echo "<td colspan=2 style='text-align: center;''> <input type='submit' value='Buscar' name = 'frmBuscar'> </td>";
				echo "</tr>";
				echo "</form>";
			}elseif(isset($resultCiudadano)){
					echo "<tr>";
				echo "<td colspan=2 style='text-align: center;'> Busqueda de ciudadano</td>";
				echo "</tr>";
				echo "<tr>";
				echo "<td> Cédula: </td>";
				echo "<td> <input type='text' name='au_cedula' id='au_cedula' placeholder='Cédula' readonly value='" . $resultCiudadano[0]['id_ciudadano'] . "' </td>";
				echo "</tr>";
			}else{
				echo "<tr><td><h4>Datos sobre el ciudadano</h4> </td><td>";
				echo "<input type='text' placeholder='Cédula' name='au_cedula' id ='au_cedula'></td>";
				echo "<tr><td>Nombre: </td><td>";
				echo "<input type='text' placeholder='Nombre' name='au_name' id ='au_name'></td>";

				echo "<tr><td>Lugar de residencia: </td><td>";
				echo "<input type='text' placeholder='Lugar de residencia' name='au_residencia' id ='au_residencia'></td>";

				echo "<tr><td>Teléfono: </td><td>";
				echo "<input type='text' placeholder='Teléfono' name='au_tlf' id ='au_tlf'></td>";

				echo "<tr><td>Correo Electrónico: </td><td><input type='text' placeholder='Correo Electrónico' name='au_email' id ='au_email'></td>";

			}
		?>
		
	</table>
	<form action="NuevaDenuncia.php" method=post>
		<table>

		<tr><td><h4>Elija la categoría de la denuncia</h4> </td><td>

		<tr><td>Categoría: </td><td>
		<input list="browsers" name="au_categoria" id="au_categoria">
		  <datalist id="browsers">
		    <option value="Aseo">Aseo</option>
		    <option value="Luminarias">Luminarias</option>
		    <option value="Seguridad">Seguridad</option>
		    <option value="Transportes">Transporte</option>
		    <option value="Agua Potable">Agua Potable</option>
		    <option value="Alcantarillado">Alcantarillado</option>
		  </datalist></td>
		
		<tr><td><h4>Datos sobre el lugar</h4> </td><td>

		<tr><td>Provincia: </td><td>
		<input list="provincia" name="au_provincia" id="au_provincia">
		  <datalist id="provincia">
			
		    <option value="Bocas del Toro">Bocas del Toro</option>
		    <option value="Coclé">Coclé</option>
		    <option value="Colón">Colón</option>
		    <option value="Chiriqui">Chiriquí</option>
		    <option value="Darien">Darien</option>
			<option value="Herrera">Herrera</option>
			<option value="Los Santos">Los Santos</option>
			<option value="Panamá">Panamá</option>
			<option value="Veraguas">Veraguas</option>
			<option value="Panama Oeste">Panamá Oeste</option>
		  </datalist></td>
	
		<tr><td><h4>Datos sobre la denuncia</h4> </td><td>


		<tr><td>Descripción: </td><td>
		<input type="text" placeholder="Descripción del Problema" name=
		"au_descript" id ="au_descript"></td>
		<tr><td>Fecha de denuncia </td><td>
		<input type="date" placeholder="Fecha de denuncia" name=
		"au_date" id ="au_date"></td>
		</td>
		<tr><td>Lugar de la denuncia </td><td>
		<input type="text" placeholder="Lugar de la denuncia" name=
		"au_lugar" id ="au_lugar"></td>
			
		
		<tr><td colspan=2>
		<input type="submit" value="Guardar"></td>
	</form>



</section>

</body>
</html>