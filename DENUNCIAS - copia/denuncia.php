<?php

require_once("class/Categorias.php");
$objCategoria = new Categorias();
$resultCategoria = $objCategoria->CategoriasBuscar();

require_once("class/Provincia.php");
$objProvincia = new Provincia();
$resultProvincia = $objProvincia->ProvinciaBuscar();

if(array_key_exists('frmBuscar', $_POST)) {
    unset($_SESSION['sessionUserLogin']);
    $miArray = $_POST;
  
    $au_cedula = $_POST['au_cedula'];
  
    require_once("class/Ciudadano.php");
    $objTasks = new Ciudadano();
    $resultCiudadano = $objTasks->CiudadanoBuscar($au_cedula);
    if(isset($resultCiudadano)){
        $_SESSION['sessionUserLogin'] = $resultCiudadano[0];
    }
    
  }

  if(array_key_exists('frmNew', $_POST)) {
    unset($_SESSION['sessionUserLogin']);
    $miArray = $_POST;
  
    $au_cedula = $_POST['au_cedula'];
    $au_name = $_POST['au_name'];
    $au_residencia = $_POST['au_residencia'];
    $au_tlf = $_POST['au_tlf'];
    $au_email = $_POST['au_email'];
  
    require_once("class/Ciudadano.php");
    $objTasks = new Ciudadano();
    $objTasks->CiudadanoNew($au_cedula, $au_name, $au_residencia, $au_tlf, $au_email);
    $resultCiudadano = $objTasks->CiudadanoBuscar($au_cedula);

    if(isset($resultCiudadano)){
        $_SESSION['sessionUserLogin'] = $resultCiudadano[0];
    }
  }
  if(array_key_exists('frmGuardar', $_POST)) {
    unset($_SESSION['sessionUserLogin']);
    $miArray = $_POST;
  
    $au_cedula = $_POST['au_cedula'];
    $au_name = $_POST['au_name'];
    $au_residencia = $_POST['au_residencia'];
    $au_tlf = $_POST['au_tlf'];
    $au_email = $_POST['au_email'];
    $au_categoria = $_POST['au_categoria'];
    $au_provincia = $_POST['au_provincia'];
    $au_descript = $_POST['au_descript'];
    $au_date = $_POST['au_date'];
    $au_lugar = $_POST['au_lugar'];
  
    require_once("class/Ciudadano.php");
    $objTasks = new Ciudadano();
    $objTasks->CiudadanoNew($au_cedula, $au_name, $au_residencia, $au_tlf, $au_email);
    $resultCiudadano = $objTasks->CiudadanoBuscar($au_cedula);

    if(isset($resultCiudadano)){
        $_SESSION['sessionUserLogin'] = $resultCiudadano[0];
    }
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<header>	
	<h1><a href="home.php">Pagina Principal</a></h1>
</header>
<h1>Formulario de registro</h1>

<table>
		<?php
			if(!isset($resultCiudadano) && !array_key_exists('frmBuscar', $_POST) && !array_key_exists('frmNew', $_POST)){
				echo "<form action='Denuncia.php' method=post>";
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
                echo "<tr><td>Cédula: </td><td>";

				echo "<input type='text' placeholder='Cédula' name='au_cedula' id ='au_cedula' readonly value='" . $au_cedula . "'></td>";
				echo "<tr><td>Nombre: </td><td>";
				echo "<input type='text' placeholder='Nombre' name='au_name' id ='au_name' readonly value='" . $_SESSION['sessionUserLogin']['nombre_ciudadano'] . "'></td>";

				echo "<tr><td>Lugar de residencia: </td><td>";
				echo "<input type='text' placeholder='Lugar de residencia' name='au_residencia' id ='au_residencia' readonly value='" . $_SESSION['sessionUserLogin']['Lugar_reside'] . "'></td>";

				echo "<tr><td>Teléfono: </td><td>";
				echo "<input type='text' placeholder='Teléfono' name='au_tlf' id ='au_tlf' readonly value='" . $_SESSION['sessionUserLogin']['Telefono'] . "'></td>";

				echo "<tr><td>Correo Electrónico: </td><td><input type='text' placeholder='Correo Electrónico' name='au_email' id ='au_email' readonly value='" . $_SESSION['sessionUserLogin']['Correoelectronico'] . "'></td>";
				echo "</tr>";
			}else{
				echo "<form action='Denuncia.php' method=post>";
                echo "<tr><td><h4>Datos sobre el ciudadano</h4> </td> </tr>";
                echo "<tr><td>Cédula: </td><td>";

				echo "<input type='text' placeholder='Cédula' name='au_cedula' id ='au_cedula' readonly value='" . $au_cedula . "'></td>";
				echo "<tr><td>Nombre: </td><td>";
				echo "<input type='text' placeholder='Nombre' name='au_name' id ='au_name'></td>";

				echo "<tr><td>Lugar de residencia: </td><td>";
				echo "<input type='text' placeholder='Lugar de residencia' name='au_residencia' id ='au_residencia'></td>";

				echo "<tr><td>Teléfono: </td><td>";
				echo "<input type='text' placeholder='Teléfono' name='au_tlf' id ='au_tlf'></td>";

				echo "<tr><td>Correo Electrónico: </td><td><input type='text' placeholder='Correo Electrónico' name='au_email' id ='au_email'></td>";
                echo "<tr>";
				echo "<td colspan=2 style='text-align: center;''> <input type='submit' value='R egistrar' name = 'frmNew'> </td>";
				echo "</tr>";
				echo "</form>";
			}
		?>
		
	</table>
    <br>
    <table>
        <?php
        if(isset($_SESSION['sessionUserLogin'])){
            echo "<form action='Denuncia.php' method=post>";
            echo "<tr><td><h4>Elija la categoría de la denuncia</h4> </td></tr>";
            echo "<tr><td>Categoría: </td><td>";
            echo "<input list='browsers' name='au_categoria' id='au_categoria'>";
            echo "<datalist id='browsers'>";
            foreach($resultCategoria as $categoria){
                echo "<option value='" . $categoria['nombre_categoria'] . "'>" . $categoria['nombre_categoria'] . "</option>";
            }
            echo "</datalist></td>";
            echo "</tr>";
            echo "<tr><td><h4>Datos sobre el lugar</h4> </td></tr>";
            echo "<tr><td>Provincia: </td><td>";
            echo "<input list='provincia' name='au_provincia' id='au_provincia'>";
            echo "<datalist id='provincia'>";
            foreach($resultProvincia as $provincia){
                echo "<option value='" . $provincia['nombre_provincia'] . "'>" . $provincia['nombre_provincia'] . "</option>";
            }
            echo "</datalist></td>";
            echo "</tr>";



            echo "<tr><td><h4>Datos sobre la denuncia</h4> </td></tr>";
            echo "<tr><td>Descripción: </td><td>";
            echo "<input type='text' placeholder='Descripción del Problema' name='au_descript' id ='au_descript'></td>";
            echo "<tr><td>Fecha de denuncia </td><td>";
            echo "<input type='date' placeholder='Fecha de denuncia' name='au_date' id ='au_date'></td>";
            echo "</td>";
            echo "<tr><td>Lugar de la denuncia </td><td>";
            echo "<input type='text' placeholder='Lugar de la denuncia' name='au_lugar' id ='au_lugar'></td>";
            echo "</tr>";
            echo "<tr>";
            echo "<td colspan=2 style='text-align: center;''> <input type='submit' value='Guardar' name = 'frmGuardar'> </td>";
            echo "</tr>";
            echo "</form>";
        }

        ?>

    </table>
</body>
</html>