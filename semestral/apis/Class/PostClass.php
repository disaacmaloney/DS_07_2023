<?php
    //encabezados obligatorios
    header("Access-Control-Allow-Origin: *");
    header("Content-Type: application/json; charset=UTF-8");
    header("Access-Control-Allow-Methods: POST");
    header("Access-Control-Max-Age: 3600");
    header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow- Headers, Authorization, X-Requested-With");

    include_once  '../../class/ClassCE.php';   

    $objClass = new ClassCE();

    $data = json_decode(file_get_contents("php://input"));

    $data = file_get_contents('php://input');

    $jsonData = json_decode($data, true);

    $CLA_NAME = $jsonData['CLA_NAME'];
    $CLA_COD = $jsonData['CLA_COD'];

    $result = $objClass->PostClass($CLA_NAME, $CLA_COD);