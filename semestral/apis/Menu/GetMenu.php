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

$listMenu = $objMenu->GetMenu();

$records = count($listMenu);


if ($records > 0) {
    // array de usuarios
    $arrMenu = array();
    $arrMenu["records"] = array();

    // recorrer el array de usuarios
    foreach ($listMenu as $Menu) {
        $objMenu2 = new MenuCE();
        
        $resultSubsMenu = $objMenu2->GetSubMenu($ID_ROLE, $Menu["ID_MENU"]);
        $recordsSubsMenu = 0;
        if(!is_null($resultSubsMenu)){
            $recordsSubsMenu = count($resultSubsMenu);
            if($recordsSubsMenu > 0){

                $arrMenuSubsMenu = array();


                foreach ($resultSubsMenu as $MenuSubs) {
                    $arrMenuSubss = array(
                        "ID_ROLE" => $MenuSubs["ID_ROLE"],
                        "ROL_NAME" => $MenuSubs["ROL_NAME"],
                        "ID_MENU" => $MenuSubs["ID_MENU"],
                        "MEN_NAME" => $MenuSubs["MEN_NAME"],
                        "ID_MENU_PARENT" => $MenuSubs["ID_MENU_PARENT"],
                        "MEN_URL" => $MenuSubs["MEN_URL"]
                    );
                    array_push($arrMenuSubsMenu, $arrMenuSubss);
                }
                
                $arrMenus = array(
                    "ID_MENU" => $Menu["ID_MENU"],
                    "MEN_NAME" => $Menu["MEN_NAME"],
                    "IS_PARENT" => $Menu["IS_PARENT"],
                    "ID_MENU_PARENT" => $Menu["ID_MENU_PARENT"],
                    "MEN_URL" => $Menu["MEN_URL"],
                    "subMenu" => $arrMenuSubsMenu
                );
                array_push($arrMenu["records"], $arrMenus);
            }
        }
        
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
