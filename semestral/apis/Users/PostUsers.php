<?php
    //encabezados obligatorios
    header("Access-Control-Allow-Origin: *");
    header("Content-Type: application/json; charset=UTF-8");
    header("Access-Control-Allow-Methods: POST");
    header("Access-Control-Max-Age: 3600");
    header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow- Headers, Authorization, X-Requested-With");

    include_once  '../../class/Users.php';    

    $objUsers = new users();

    $data = json_decode(file_get_contents("php://input"));
    
    $data = file_get_contents('php://input');

    $jsonData = json_decode($data, true);

    $USE_NAME = $jsonData['USE_NAME'];
    $USE_PASSWORD = $jsonData['USE_PASSWORD'];
    $USE_USER = $jsonData['USE_USER'];
    $USE_LASTNAME = $jsonData['USE_LASTNAME'];
    $USE_DATE_BIRTH = $jsonData['USE_DATE_BIRTH'];
    $ID_GENDER = $jsonData['ID_GENDER'];
    $ID_ROLE = $jsonData['ID_ROLE'];

    $result = $objUsers->PostUsers($USE_NAME, $USE_PASSWORD,$USE_USER, $USE_LASTNAME, $USE_DATE_BIRTH, $ID_GENDER, $ID_ROLE);


 