<!DOCTYPE html>
<html>
<head>
	<title>Formulario Actualizar</title>
	<meta charset="utf-8">
	<link rel="stylesheet" href="css/FormConsultarDenuncia.css">
</head>
<br><br>
<h1>Actualizar Registros</h1>
<br><br>
<body>
	<form action="updateauthors.php" method=post>

	<tr><td>ID de denuncia: </td><td>
		<input type="text" placeholder="Id denuncia" name=
		"au_id" id ="au_id"></td>
		<br><br>
	<tr><td>Categoría: </td><td>
		<input list="browsers" name="nombre_categoria" id="nombre_categoria">
		  <datalist id="browsers">
		    <option value="Aseo">
		    <option value="Luminarias">
		    <option value="Seguridad">
		    <option value="Transportes">
		    <option value="Agua Potable">
		    <option value="Alcantarillado">
		  </datalist></td>
		
		<tr><td><h4>Datos sobre el lugar</h4> </td><td>

		<tr><td>Provincia: </td><td>
		<input list="provincia" name="nombre_provincia" id="nombre_provincia">
		  <datalist id="provincia">
		    <option value="Bocas del Toro">
		    <option value="Coclé">
		    <option value="Colón">
		    <option value="Chiriqui">
		    <option value="Darien">
			<option value="Herrera">
			<option value="Los Santos">
			<option value="Panamá">
			<option value="Veraguas">
			<option value="Panama Oeste">
		  </datalist></td>
		
		<tr><td><h4>Datos sobre el ciudadano</h4> </td><td>
		

		<tr><td>Cédula: </td><td>
		<input type="text" placeholder="Cédula" name=
		"au_cedula" id ="au_cedula"></td>

		<tr><td>Nombre: </td><td>
		<input type="text" placeholder="Nombre" name=
		"au_name" id ="au_name"></td>
		<br>
		<tr><td>Lugar de residencia: </td><td>
		<input type="text" placeholder="Lugar de residencia" name=
		"au_residencia" id ="au_residencia"></td>
		<br>
		<tr><td>Teléfono: </td><td>
		<input type="text" placeholder="Teléfono" name=
		"au_tlf" id ="au_tlf"></td>
	<br>
		<tr><td>Correo Electrónico: </td><td>
			<input type="text" placeholder="Correo Electrónico" name=
		"au_email" id ="au_email"></td>


		<tr><td><h4>Datos sobre la denuncia</h4> </td><td>


		<tr><td>Descripción: </td><td>
		<input type="text" placeholder="Ciudad" name=
		"au_descript" id ="au_descript"></td>
		<br>
		<tr><td>Lugar de la denuncia </td><td>
		<input type="text" placeholder="Lugar de la denuncia" name=
		"au_lugar" id ="au_lugar"></td>
		<br>
		<tr><td>Estado de denuncia: </td><td>
		<input list="estado" name="Estatus_denuncia" id="Estatus_denuncia">
		  <datalist id="estado">
			<option value="A">
		    <option value="P">
		    <option value="C">
		    <option value="D">
		  </datalist></td>
			
		<br><br>
		<tr><td colspan=2>
		<input type="submit" value="Guardar"></td>
	</form>
</body>
</html>