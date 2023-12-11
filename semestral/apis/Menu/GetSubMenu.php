<?php
//encabezados obligatorios
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Methods: POST");
header("Access-Control-Max-Age: 3600");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow- Headers, Authorization, X-Requested-With");

include_once '../../class/MenuCE.php';

$objMenu = new MenuCE();

$data = json_decode(file_get_contents("php://input"));
    
$data = file_get_contents('php://input');

// Decodificar los datos JSON
$jsonData = json_decode($data, true);

$ID_ROLE = $jsonData['ID_ROLE'];
$ID_MENU_PARENT = $jsonData['ID_MENU_PARENT'];

//imprime array
$result = $objMenu->GetSubMenu($ID_ROLE, $ID_MENU_PARENT);
$records = 0;
if(!is_null($result)){
    $records = count($result);
}

if($records > 0){

    $arrMenu = array();
    $arrMenu["records"] = array();

    foreach ($result as $Menu) {
        $arrMenus = array(
            "ID_ROLE" => $Menu["ID_ROLE"],
            "ROL_NAME" => $Menu["ROL_NAME"],
            "ID_MENU" => $Menu["ID_MENU"],
            "MEN_NAME" => $Menu["MEN_NAME"],
            "ID_MENU_PARENT" => $Menu["ID_MENU_PARENT"],
            "MEN_URL" => $Menu["MEN_URL"]
        );
        array_push($arrMenu["records"], $arrMenus);
    }
    http_response_code(200);

    // mostrar los datos en formato json
    echo json_encode($arrMenu);
} else {
    // respuesta 404 - No encontrado
    http_response_code(404);

    
}




