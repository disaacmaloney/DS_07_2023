<?php
	$au_cat=$_POST["au_categoria"];
	$au_provincia=$_POST["au_provincia"];
	$au_cedula=$_POST["au_cedula"];
	$cedula=$_POST["cedula"];
    $nombre=$_POST["nombre"];
	$descripcion=$_POST["descripcion"];
	$lugar=$_POST["lugar"];
    $au_id=$_POST["au_id"];


	try{
		$base=new PDO('mysql:host=localhost; dbname=dbdenuncia', 	'root', '');
		$base->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		$base->exec("SET CHARACTER SET utf8");

		$sql="update denuncia 
		set au_categoria = :raucategoria, au_provincia=:rauprovincia, cedula=:rcedula, nombre=:rnombre, descripcion=:rdescripcion,lugar=:rlugar
		 where au_id=:rauid";
		$resultado=$base->prepare($sql);
		$resultado->execute(array(":raucategoria"=>$au_cat,
		":rauprovincia"=>$au_provincia,":rcedula"=>$cedula,":rnombre"=>$nombre,":rauid"=>$au_id,":rdescipcion"=>$descripcion,":rlugar"=>$lugar));


		echo "Registro actualizado"." <br>";


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