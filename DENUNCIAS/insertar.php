<?php
	$au_categoria=$_POST["au_categoria"];
	$au_provincia=$_POST["au_provincia"];
	$au_cedula=$_POST["au_cedula"];
	$au_name=$_POST["au_name"];
	$au_residencia=$_POST["au_residencia"];
	$au_tlf=$_POST["au_tlf"];
	$au_email=$_POST["au_email"];
	$au_descript=$_POST["au_descript"];
	$au_date=$_POST["au_date"];
	$au_lugar=$_POST["au_lugar"];
	$au_estatus=$_POST["au_estatus"];


	try{
		$base=new PDO('mysql:host=localhost; dbname=bd_denuncias', 	'root', '');
		$base->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		$base->exec("SET CHARACTER SET utf8");
		$sql="insert into denuncia (au_categoria, au_provincia, au_cedula, au_name, au_residencia, au_tlf, au_email, au_descript, au_date, au_lugar, au_estatus) values(:raucategoria, :rauprovincia, :raucedula, :rauname, :rauresidencia, :rautlf, :rauemail, :raudescript, :raudate, :raulugar, :rauestatus)";
		$resultado=$base->prepare($sql);
		$resultado->execute(array(":raucategoria"=>$au_categoria,":rauprovincia"=>$au_provincia, ":raucedula"=>$au_cedula, ":rauname"=>$au_name, ":rauresidencia"=>$au_residencia, ":rautlf"=>$au_tlf,":rauemail"=>$au_email, ":raudescript"=>$au_descript, ":raudate"=>$au_date, ":raulugar"=>$au_lugar, ":rauestatus"=>$au_estatus));

		echo "Registro insertado"." <br>";


		


	}catch(Exception $e){
		die('Error: ' . $e->GetMessage());
	}finally{
		$base=null;
	}
?>