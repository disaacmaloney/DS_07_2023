<?php
//encabezados obligatorios
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");


include_once '../../class/ClassCE.php';

$objClass = new ClassCE();
$listClass = $objClass->GetClass();

// cuenta la cantidad de registros que devuelve el array
$records = count($listClass);


if($records > 0){
    // array de usuarios
    $arrClass = array();
    $arrClass["records"] = array();

    // recorrer el array de usuarios
    foreach($listClass as $miClass){
        $arrClassE = array(
            "ID_CLASS" => $miClass["ID_CLASS"],
            "CLA_NAME" => $miClass["CLA_NAME"],
            "CLA_COD" => $miClass["CLA_COD"],
        );
        array_push($arrClass["records"], $arrClassE);
    }
    // respuesta 200 - OK
    http_response_code(200);

    // mostrar los datos en formato json
    echo json_encode($arrClass);
} else {
    // respuesta 404 - No encontrado
    http_response_code(404);

    // mensaje de que no se encontraron usuarios
    echo json_encode(
        array("message" => "No se encontraron usuarios.")
    );
}