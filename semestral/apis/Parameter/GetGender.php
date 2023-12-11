<?php
//encabezados obligatorios
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");

include_once '../../class/ParameterCE.php';

$objGender = new ParameterCE();
$listGender = $objGender->GetGender();

$records = count($listGender);


if ($records > 0) {
    // array de usuarios
    $arrGender = array();
    $arrGender["records"] = array();

    // recorrer el array de usuarios
    foreach ($listGender as $Gender) {
        $arrGenders = array(
            "ID_PARAMETER" => $Gender["ID_PARAMETER"],
            "PAR_NAME" => $Gender["PAR_NAME"],
            "PAR_VALUE" => $Gender["PAR_VALUE"]
        );
        array_push($arrGender["records"], $arrGenders);
    }
    // respuesta 200 - OK
    http_response_code(200);

    // mostrar los datos en formato json
    echo json_encode($arrGender);
} else {
    // respuesta 404 - No encontrado
    http_response_code(404);

    // mensaje de que no se encontraron usuarios
    echo json_encode(
        array("message" => "No se encontraron usuarios.")
    );
}