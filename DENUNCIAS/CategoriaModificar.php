<?php
    include_once('Principales/header.php');
    require_once("class/Categorias.php");

    if(array_key_exists('frmBuscar', $_POST)){
        $id_categoria = $_POST['id_categoria'];
        $objCategorias = new Categorias();
        $resultCategoriasById = $objCategorias->CategoriasBuscarId($id_categoria);
    }
    if(array_key_exists('frmModificar', $_POST)){
        $id_categoria = $_POST['id_categoria'];
        $nombre_categoria = $_POST['nombre_categoria'];
        $EntidadResponsable = $_POST['EntidadResponsable'];
        $Correo = $_POST['Correo'];
        $objCategoriasActu = new Categorias();
        $objCategoriasActu->CategoriasModificar($id_categoria, $nombre_categoria,$EntidadResponsable,$Correo);
    }

    $objCategorias = new Categorias();
    $resultCategorias = $objCategorias->CategoriasBuscar();
?>

<h2>Categorias</h2>

<div class="table-data">
    <div class="order">
        <div class="head">
            <h3>Modificar Categorias</h3>
        </div>
        <?php
        if(!isset($resultCategoriasById)){
            ?>
            <form action="CategoriaModificar.php" method="post">
        <table>
            <thead>
                <tr>
                    <td></td>
                    <td>Id</td>
                    <td>Nombre</td>
                    <td>Entidad Responsable</td>
                    <td>Correo</td>
                </tr>
            </thead>
            <tbody>
                
                <?php
                    foreach($resultCategorias as $key => $value){
                        echo "<tr>";
                        echo "<td><input type='radio' name='id_categoria' value='".$value['id_categoria']."'></td>";
                        echo "<td>".$value['id_categoria']."</td>";
                        echo "<td>".$value['nombre_categoria']."</td>";
                        echo "<td>".$value['EntidadResponsable']."</td>";
                        echo "<td>".$value['Correo']."</td>";
                        echo "</tr>";
                    }
                ?>            
        </table>
        <input type="submit" class="btn-download" name="frmBuscar" value="Modificar">
        </form>
        <?php
        }else{
            echo "<form action='CategoriaModificar.php' method='post'>";
            echo "<label for='id_categoria'>Id</label>";
            echo "<input type='text' name='id_categoria' value='".$resultCategoriasById[0]['id_categoria']."' readonly>";
            echo "<br>";
            echo "<label for='nombre_categoria'>Nombre</label>";
            echo "<input type='text' name='nombre_categoria' value='".$resultCategoriasById[0]['nombre_categoria']."'>";
            echo "<br>";
            echo "<label for='EntidadResponsable'>Entidad Responsable</label>";
            echo "<input type='text' name='EntidadResponsable' value='".$resultCategoriasById[0]['EntidadResponsable']."'>";
            echo "<br>";
            echo "<label for='Correo'>Correo</label>";
            echo "<input type='text' name='Correo' value='".$resultCategoriasById[0]['Correo']."'>";
            echo "<br>";
            echo "<input type='submit' class='btn-download' name='frmModificar' value='Modificar'>";
            echo "</form>";
        }
        ?>
    </div>
</div>