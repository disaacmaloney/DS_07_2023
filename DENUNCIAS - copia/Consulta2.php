<?php
	session_start();
	if(!isset($_SESSION["usuario"])){
		header("Location:login.php");
	}
?>


<?php
echo "Usuario: ".$_SESSION["usuario"]."<br><br>";
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
	$busqueda_provincia=$_POST["au_provincia"];
	$busqueda_categoria=$_POST["au_categoria"];
	$busqueda_estatus=$_POST["au_estatus"];

	
	try{
		$base=new PDO('mysql:host=localhost; dbname=pubs', 	'root', '');
		$base->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		$base->exec("SET CHARACTER SET utf8");
		$sql="Select au_id, au_lname from authors where city=:n_city and state=:n_state
		";
		$resultado=$base->prepare($sql);
		$resultado->execute(array(":n_city"=>$busqueda_city,":n_state"=>$busqueda_state));

		while($registro=$resultado->fetch(PDO::FETCH_ASSOC)){
			echo 'Identificacion '.$registro["au_id"] . " Apellido ".$registro["au_lname"]."<br>";
		}

	}catch(Exception $e){
		die('Error: ' . $e->GetMessage());
	}finally{
		$base=null;
	}
?>
</body>