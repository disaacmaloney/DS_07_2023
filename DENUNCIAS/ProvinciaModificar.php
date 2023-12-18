<?php
    include_once('Principales/header.php');
    require_once("class/Provincia.php");

    if(array_key_exists('frmBuscar', $_POST)) { 
        $id_provincia = $_POST['id_provincia'];
        $objProvincia = new Provincia();
        $resultProvinciaById = $objProvincia->ProvinciaBuscarId($id_provincia);
    }
    if(array_key_exists('frmModificar', $_POST)) { 
        $id_provincia = $_POST['id_provincia'];
        $nombre_provincia = $_POST['nombre_provincia'];
        $objProvinciaActu = new Provincia();
        $objProvinciaActu->ProvinciaModificar($id_provincia, $nombre_provincia); 
    }

    $objProvincia = new Provincia();
    $resultProvincia = $objProvincia->ProvinciaBuscar(); 
?>

<h2>Provincia</h2>

<div class="table-data">
	<div class="order">
		<div class="head">
			<h3>Modificar Provincia</h3>
		</div>
        <?php 
        if(!isset($resultProvinciaById)){
            ?>
            <form action="ProvinciaModificar.php" method="post">
        <table>
            <thead>
                <tr>
                    <td></td>
                    <td>Id</td>
                    <td>Nombre</td>
                </tr>
            </thead>
            <tbody>
                
                <?php
                    foreach($resultProvincia as $key => $value){
                        echo "<tr>";
                        echo "<td><input type='radio' name='id_provincia' value='".$value['id_provincia']."'></td>";
                        echo "<td>".$value['id_provincia']."</td>";
                        echo "<td>".$value['nombre_provincia']."</td>";
                        echo "</tr>";
                    }
                ?>            
        </table>
        <input type="submit" class="btn-download" name="frmBuscar" value="Modificar">
        </form>
        <?php
        }else{
            echo "<form action='ProvinciaModificar.php' method='post'>";
            echo "<label for='id_provincia'>Id</label>";
            echo "<input type='text' name='id_provincia' value='".$resultProvinciaById[0]['id_provincia']."' readonly>";
            echo "<br>";
            echo "<label for='nombre_provincia'>Nombre</label>";
            echo "<input type='text' name='nombre_provincia' value='".$resultProvinciaById[0]['nombre_provincia']."'>";
            echo "<br>";
            echo "<input type='submit' class='btn-download' name='frmModificar' value='Modificar'>";
            echo "</form>";
        }
        ?>
	</div>
</div>