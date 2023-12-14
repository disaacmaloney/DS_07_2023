<!DOCTYPE html>
<html>
<head>
    <title>Sistema Editorial</title>
    <link rel="stylesheet" type="text/css" href="estilo.css">
    <meta charset="utf-8">
</head>

<?php
        try{
            $base=new PDO('mysql:host=localhost; dbname=bd_denuncias', 'root', '');
            $base->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);     
            $sql="Select * from usuario where usuario =:usuario and tipo_admin = :password";    
            $resultado=$base->prepare($sql);
            $login=htmlentities(addslashes($_POST["usuario"]));
            $password=htmlentities(addslashes($_POST["password"]));
            $resultado->bindValue(":usuario",$login);
            $resultado->bindValue(":password",$password);
            $resultado->execute();

            $numero_registro=$resultado->rowCount();

            if ($numero_registro!=0){
                session_start();
                $_SESSION["usuario"] =$_POST["usuario"];
                header("location:menuadmin.php");


            }
            else{
                header("location:home.php");
            }
        }catch(Exception $e){
            die("Error ".$e->getMessage());
        }

?>

</html>