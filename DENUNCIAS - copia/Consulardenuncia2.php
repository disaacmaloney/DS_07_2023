<!DOCTYPE html>
<html>
<head>
    <title></title>
    <link rel="stylesheet" href="css/FormConsultarDenuncia.css">
</head>


<body>

<header>
  
  <h1><a href="home.php">Home</a></h1>

</header>


<h1>Bienvenidos usuarios</h1>

<section id="MainCaja">
    
    
    <form method="post" action="Consulta1.php"><br>
        Filtre por categoría:<br>
       <tr><td>Categoría: </td><td>
        <input type="text" placeholder="Categoria" name=
        "au_categoria"></td>
        <tr><td colspan="2">        <input type="submit" name="enviando" value="Aceptar">   </td></tr></table>
    </form>

    <form method="post" id = "ProvinciaCategoriaEstatus" action="Consulta2.php"><br>
        Filtro por provincia<br>
        <tr><td>Provincia: </td><td>
        <input type="text" placeholder="Provincia" name=
        "au_provincia" id ="au_provincia"></td>
        <tr><td colspan="2">        <input type="submit" name="enviando" value="Aceptar">   </td></tr></table>
    </form>

    <form method="post" id = "Ciudano" action="Consulta3.php"><br>
        Filtre por ciudano:<br>
        <tr><td>Ciudanano: </td><td>
        <input type="text" placeholder="Ciudanano" name=
        "au_name" id ="au_name"></td>
        <tr><td colspan="2">		<input type="submit" name="enviando" value="Aceptar">	</td></tr></table>
    </form>



</section>


</body>
</html>