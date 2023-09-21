<?php
if (is_uploaded_file ($_FILES['nombre_archivo_cliente']['tmp_name']))
{
    $nombreDirectorio = "files";
    $nombrearchivo = $_FILES['nombre_archivo_cliente']['name'];
    $nombreCompleto = $nombreDirectorio . '/' .$nombrearchivo;
    $tamanoMaximo = 1024 * 1024; 
    $extensionesValidas = array('png', 'jpg', 'jpeg', 'pdf');

    if ($_FILES['nombre_archivo_cliente']['size'] > $tamanoMaximo)
    {
        echo "El archivo es demasiado grande para ser cargado en el servidor. <br><br>El tamaño máximo permitido es 1 MB. <br>";
    }
    else
    {
        $extension = strtolower(pathinfo($nombrearchivo, PATHINFO_EXTENSION));
        echo "El archivo se ha subido satisfactoriamente al directorio $extension <br>";

        if (in_array($extension, $extensionesValidas))
        {
            if (is_file($nombreCompleto))
            {
                $idUnico = time();
                $nombrearchivo = $idUnico . "-" . $nombrearchivo;
                echo "Archivo repetido, se cambiara el nombre a $nombrearchivo <br><br>";
            }
            move_uploaded_file ($_FILES['nombre_archivo_cliente']['tmp_name'],
            $nombreDirectorio . '/' . $nombrearchivo);
            echo "El archivo se ha subido satisfactoriamente al directorio $nombreDirectorio <br>";
        } 
        else
        {
            echo "La extension del archivo es invalida";

        }       
    }   
}
else
    echo "No se ha podido subir el archivo <br>";
?>