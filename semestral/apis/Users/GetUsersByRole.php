<?php
//encabezados obligatorios
    header("Access-Control-Allow-Origin: *");
    header("Content-Type: application/json; charset=UTF-8");
    header("Access-Control-Allow-Methods: POST");
    header("Access-Control-Max-Age: 3600");
    header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow- Headers, Authorization, X-Requested-With");

include_once '../../class/Users.php';

$objUsers = new Users();


$data = json_decode(file_get_contents("php://input"));
    
$data = file_get_contents('php://input');

$jsonData = json_decode($data, true);

$ID_ROLE = $jsonData['ID_ROLE'];


$listUsers = $objUsers->GetUsersByRole($ID_ROLE );

$records = count($listUsers);

if ($records > 0) {

    $arrUsers = array();
    $arrUsers["records"] = array();

    // recorrer el array de usuarios
    foreach ($listUsers as $Users) {
        $arrUserss = array(
            "ID_USER" => $Users["ID_USER"],
            "USE_NAME" => $Users["USE_NAME"],
            "USE_LASTNAME" => $Users["USE_LASTNAME"],
            "USE_USER" => $Users["USE_USER"],
            "USE_DATE_BIRTH" => $Users["USE_DATE_BIRTH"],
            "ID_ROLE" => $Users["ID_ROLE"],
            "ROL_NAME" => $Users["ROL_NAME"],
            "ID_GENDER" => $Users["ID_GENDER"],
            "GENDER_VALUE" => $Users["GENDER_VALUE"],
        );
        array_push($arrUsers["records"], $arrUserss);
    }
    // respuesta 200 - OK
    http_response_code(200);

    // mostrar los datos en formato json
    echo json_encode($arrUsers);
} else {
    // respuesta 404 - No encontrado
    http_response_code(404);

    // mensaje de que no se encontraron usuarios
    echo json_encode(
        array("message" => "No se encontraron usuarios.")
    );
}