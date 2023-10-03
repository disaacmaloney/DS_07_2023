<?php
    spl_autoload_register(function ($nombre_clase) {
        $archivo = "lab07_04/". $nombre_clase .".php";
        if(file_exists($archivo)) include_once($archivo);
    });
    $obj = new miclase();
    $obj2 = new miotraclase();
?>
