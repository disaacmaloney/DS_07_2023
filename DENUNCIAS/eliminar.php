<?php
	$au_id=$_POST["au_id"];
	

	try{
		$base=new PDO('mysql:host=localhost; dbname=bd_denuncias', 	'root', '');
		$base->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		$base->exec("SET CHARACTER SET utf8");
		$sql="delete from denuncia where au_id = :rauid";
		$resultado=$base->prepare($sql);
		$resultado->execute(array(":rauid"=>$au_id));

		echo "Registro eliminado"." <br>";


		$sql="Select au_id, au_categoria, au_provincia, cedula, nombre, descripcion, lugar, contract from denuncia order by au_categoria
		";
		$resultado=$base->prepare($sql);
		$resultado->execute();

		while($registro=$resultado->fetch(PDO::FETCH_ASSOC)){
			echo 'Id Denuncia '.$registro["au_id"] . " Categoria ".$registro["au_categoria"]." Provincia ".$registro["au_provincia"]." Cedula ".$registro["cedula"]." Nombre ".$registro["nombre"]." Descripcion ".$registro["descripcion"]." Lugar ".$registro["lugar"]."<br>";
		}


	}catch(Exception $e){
		die('Error: ' . $e->GetMessage());
	}finally{
		$base=null;
	}
?>