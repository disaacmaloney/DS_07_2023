<?php
    session_start();

    echo "usuario: " . $_REQUEST['usuario'] . "<br>";
    echo "clave: " . $_REQUEST['clave'] . "<br>";

    if(isset($_REQUEST['usuario']) && isset($_REQUEST['clave']))
    {
        $usuario = $_REQUEST['usuario'];
        $clave = $_REQUEST['clave'];

        $salt = substr($clave, 0, 2);
        $clave_crypt = crypt($clave, $salt);    

        require_once("class/usuarios.php");

        $obj_usuarios = new usuarios();
        $userValid = $obj_usuarios->validarUsuario($usuario, $clave_crypt);

        foreach($userValid as $resultado){
            foreach($resultado as $valor){
                $nFilas = $valor;
            }
        }

        if($nFilas > 0){
            $userValid = $usuario;
            $_SESSION['usuarioValido'] = $userValid;
        }


    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Laboratorio 14 - 01</title>
    <link rel="stylesheet" href="css/estilo.css">
</head>
<body>
    <?php
        if (isset($_SESSION['usuarioValido']))
        {
            echo "<h1>Gestión de noticias</h1>";
            echo "<hr>";

            echo "<ul>";
            echo "<li><a href='lab14_02.php'>Listar todas las noticias</a></li>";
            echo "<li><a href='lab14_03.php'>Listar noticias por partes</a></li>";   
            echo "<li><a href='lab14_04.php'>Buscar noticias</a></li>";
            echo "</ul>";

            echo "<hr>";

            echo "<p><a href='logout.php'>Desconectar</a></p>";
        }
        else if (isset($usuario))
        {
            echo "<br><br><br>";
            echo "<p aling='center'>Acceso no autorizado</p><br>";
            echo "<p aling='center'><a href='index.php'>Volver al inicio</a></p>";
        }
        else
        {
            echo "<br><br><br>";
            echo "<p class='parrafocentrado'>Esta zona tiene el acceso restrigido</p><br>";
            echo "<p class='parrafocentrado'>Para entrar debe identificarse</p><br>";

            echo "<form action='login.php' method='post' class='entrada' name='login'>";

            echo "<p>";
            echo "<label class='etiqueta-entrada'>Usuario:</label>";
            echo "<input type='text' name='usuario' size='15'>";
            echo "</p>";

            echo "<p>";
            echo "<label class='etiqueta-entrada'>Clave:</label>";
            echo "<input type='password' name='clave' size='15'>";
            echo "</p>";

            echo "<p>";
            echo "<input type='submit' value='Entrar'>";
            echo "</p>";

            echo "</form>";

            echo "<p class='parrafocentrado'>NOTA: si no dispone de identificacion o tiene problemas para entrar</p>";
            echo "<p class='parrafocentrado'>pongase en contacto con el ";
            echo "<a href='mailto:webmaster@localhost'>administrador</a>";
            echo " del sitio.</p>";
        }
    ?>
</body>
</html>