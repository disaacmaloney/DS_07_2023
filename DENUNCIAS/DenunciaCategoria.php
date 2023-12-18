<?php
    include_once('Principales/header.php');
    require_once("class/Categorias.php");

    if(array_key_exists('frmBuscar', $_POST)) { 
        $id_categoria = $_POST['id_categoria'];  
        require_once("class/Denuncia.php");
        $objTasks = new Denuncia();
        $resultDenuncia = $objTasks->DenunciaBuscarCategoria($id_categoria); 
    }
    $objCategorias = new Categorias();
    $resultCategorias = $objCategorias->CategoriasBuscar(); 
?>

<h2>Denuncia</h2>

<div class="table-data">
    <div class="order">
        <div class="head">
            <h3>Consulta de Denuncia por Categoría</h3>
        </div>
        <div style="display:flex; justify-content: center;align-items: center;x">
            <form action="DenunciaCategoria.php" method="post">
                <label for="id_categoria">Selecciona la Categoría a buscar: </label>
                <select name="id_categoria" id="id_categoria" style="appearance: none; width: 100%; height: 100%; background: none; padding: 7px; width: inherit; color: #333;">
                    <?php
                        foreach($resultCategorias as $key => $value){
                            echo "<option value='".$value['id_categoria']."'>".$value['nombre_categoria']."</option>";
                        }
                    ?>
                </select>
                <input type="submit" style="display: inline-block; color: #212529; text-align: center; vertical-align: middle; user-select: none; border: 1px solid transparent; padding: 0.375rem 0.75rem; line-height: 1.5; border-radius: 0.25rem; color: #fff; background-color: #007bff; border-color: #007bff; box-shadow: none;" name="frmBuscar" value="Buscar">
            </form>
        </div>
        <br>
        <table>
            <thead>
                <tr>
                    <td>Id</td>
                    <td>Fecha</td>
                    <td>Descripcion</td>
                    <td>Provincia</td>
                    <td>Ciudadano</td>
                    <td>Categoría</td>
                </tr>
            </thead>
            <tbody>
                <?php
                    if(isset($resultDenuncia)){
                        foreach($resultDenuncia as $key => $value){
                            echo "<tr>";
                            echo "<td>".$value['id_denuncia']."</td>";
                            echo "<td>".$value['au_date']."</td>";
                            echo "<td>".$value['descripcion']."</td>";
                            echo "<td>".$value['nombre_provincia']."</td>";
                            echo "<td>".$value['nombre_ciudadano']."</td>";
                            echo "<td>".$value['nombre_categoria']."</td>";
                            echo "</tr>";
                        }
                    }
                ?>
            </tbody>
        </table>
    </div>
</div>
