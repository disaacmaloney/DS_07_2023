<?php
	session_start();
	if(!isset($_SESSION["usuario"])){
		header("Location:login.php");
	}
?>



<!DOCTYPE html>
<html>
<head>
	<title></title>
	<link rel="stylesheet" type="text/css" href="estilo.css">
	<meta charset="utf-8">
</head>

<body>
<h1>Información Buscada</h1>

<?php
	$busqueda_categoria=$_POST["au_categoria"];
	
	try{
		$base=new PDO('mysql:host=localhost; dbname=bd_denuncias', 	'root', '');
		$base->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		$base->exec("SET CHARACTER SET utf8");
		$sql="Select au_name, au_descript, au_date from denuncia where au_categoria=:au_categoria
		";
		$resultado=$base->prepare($sql);
		$resultado->execute(array("au_categoria:"=>$busqueda_categoria));

		while($registro=$resultado->fetch(PDO::FETCH_ASSOC)){
			echo 'Nombre Usuario'.$registro["au_name"]." Descripcion de Denuncia ".$registro["au_descript"]." Fecha Denuncia ".$registro["au_date"]."<br>";
		}

	}catch(Exception $e){
		die('Error: ' . $e->GetMessage());
	}finally{
		$base=null;
	}
?>
</body>