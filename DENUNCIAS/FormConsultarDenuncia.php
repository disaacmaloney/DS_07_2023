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
    
    
    <form method="post" id = "CategoriaEstatus" action="Consulta1.php"><br>
        Filtre por categoría y estatus:<br>
       <tr><td>Categoría: </td><td>
        <input list="browsers" placeholder="Categoría" name="au_categoria" id="au_categoria">
          <datalist id="browsers">
            <option value="Aseo">
            <option value="Luminarias">
            <option value="Seguridad">
            <option value="Transportes">
            <option value="Agua Potable">
            <option value="Alcantarillado">
          </datalist></td>
        <tr><td>Estatus: </td><td>
         <input list="browsers" placeholder="Estatus" name="au_estatus" id="au_estatus">
          <datalist id="browsers">
            <option value="Activa">
            <option value="En atención">
            <option value="Cerrada">
            <option value="Cancelada">
          </datalist></td>
    </form>

    <form method="post" id = "ProvinciaCategoriaEstatus" action="Consulta2.php"><br>
        Filtre por provincia, categoría y estatus:<br>
        <input list="browsers" name="au_provincia" placeholder="Provincia" id="au_provincia">
          <datalist id="browsers">
            <option value="Bocas del Toro">
            <option value="Coclé">
            <option value="Colón">
            <option value="Chiriqui">
            <option value="Darién">
            <option value="Herrera">
            <option value="Los Santos">
            <option value="Panamá">
            <option value="Veraguas">
            <option value="Panamá Oeste">
          </datalist></td>
        <tr><td>Categoría: </td><td>
        <input list="browsers" name="au_categoria" placeholder="Categoría" id="au_categoria">
          <datalist id="browsers">
            <option value="Aseo">
            <option value="Luminarias">
            <option value="Seguridad">
            <option value="Transportes">
            <option value="Agua Potable">
            <option value="Alcantarillado">
          </datalist></td>
        <tr><td>Estatus: </td><td>
         <input list="browsers" placeholder="Estatus" name="au_estatus" id="au_estatus">
          <datalist id="browsers">
            <option value="Activa">
            <option value="En atención">
            <option value="Cerrada">
            <option value="Cancelada">
          </datalist></td>
    </form>

    <form method="post" id = "Ciudano" action="Consulta3.php"><br>
        Filtre por ciudano:<br>
        <tr><td>Ciudanano: </td><td>
        <input type="text" placeholder="Ciudanano" name=
        "au_name" id ="au_name"></td>

    </form>



</section>


</body>
</html>