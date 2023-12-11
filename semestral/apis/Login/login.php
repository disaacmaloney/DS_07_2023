<?php
    //encabezados obligatorios
    header("Access-Control-Allow-Origin: *");
    header("Content-Type: application/json; charset=UTF-8");
    header("Access-Control-Allow-Methods: POST");
    header("Access-Control-Max-Age: 3600");
    header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow- Headers, Authorization, X-Requested-With");

    // incluir archivos de objetos
    include_once  '../../class/LoginCE.php';    

    $objLogin = new LoginCE();

    // obtener los datos
    $data = json_decode(file_get_contents("php://input"));
    
    $data = file_get_contents('php://input');

    // Decodificar los datos JSON
    $jsonData = json_decode($data, true);

    $user = $jsonData['user'];
    $password = $jsonData['password'];

    //imprime array
    $result = $objLogin->Login($user, $password);

    echo json_encode($result);
    