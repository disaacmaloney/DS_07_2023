<?php
//encabezados obligatorios
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");

include_once '../../class/MenuCE.php';

$objMenu = new MenuCE();
$listMenu = $objMenu->GetMenu();

$records = count($listMenu);


if ($records > 0) {
    // array de usuarios
    $arrMenu = array();
    $arrMenu["records"] = array();

    // recorrer el array de usuarios
    foreach ($listMenu as $Menu) {
        $arrMenus = array(
            "ID_MENU" => $Menu["ID_MENU"],
            "MEN_NAME" => $Menu["MEN_NAME"],
            "IS_PARENT" => $Menu["IS_PARENT"],
            "ID_MENU_PARENT" => $Menu["ID_MENU_PARENT"],
            "MEN_URL" => $Menu["MEN_URL"]
        );
        array_push($arrMenu["records"], $arrMenus);
    }
    // respuesta 200 - OK
    http_response_code(200);

    // mostrar los datos en formato json
    echo json_encode($arrMenu);
} else {
    // respuesta 404 - No encontrado
    http_response_code(404);

    // mensaje de que no se encontraron usuarios
    echo json_encode(
        array("message" => "No se encontraron usuarios.")
    );
}
