<?php
//encabezados obligatorios
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");

include_once '../../class/RoleCE.php';

$objRole = new RoleCE();
$listRole = $objRole->GetRole();

$records = count($listRole);


if ($records > 0) {
    // array de usuarios
    $arrRole = array();
    $arrRole["records"] = array();

    // recorrer el array de usuarios
    foreach ($listRole as $Role) {
        $arrRoles = array(
            "ID_ROLE" => $Role["ID_ROLE"],
            "ROL_NAME" => $Role["ROL_NAME"]
        );
        array_push($arrRole["records"], $arrRoles);
    }
    // respuesta 200 - OK
    http_response_code(200);

    // mostrar los datos en formato json
    echo json_encode($arrRole);
} else {
    // respuesta 404 - No encontrado
    http_response_code(404);

    // mensaje de que no se encontraron usuarios
    echo json_encode(
        array("message" => "No se encontraron usuarios.")
    );
}