<?php
    $url = 'http://localhost/DS_07_2023/semestral/apis/';

    if(array_key_exists('formNewUser', $_POST)){
        $dataNewUser = array(
            'USE_NAME' => $_POST['txt_use_name'],
            'USE_LASTNAME' => $_POST['txt_use_lastName'],
            'USE_USER' => $_POST['txt_use_user'],
            'USE_PASSWORD' => $_POST['txt_password'],
            'USE_DATE_BIRTH' => $_POST['txt_bithDays'],
            'ID_ROLE' => $_POST['ddl_id_role'],
            'ID_GENDER' => $_POST['ddl_id_gender']

        );

        $jsonDataNewUser = json_encode($dataNewUser);

        $ch = curl_init($url .'Users/PostUsers.php');
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $jsonDataNewUser);
        curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type:application/json'));
        $response = curl_exec($ch);
        curl_close($ch);

        echo $response;
        header("Location: UserNew.php");
    }

    $dataRole = file_get_contents($url . 'Role/GetRole.php');
    $optionsRole = json_decode($dataRole, true);
    
    $dataGender = file_get_contents($url . 'Parameter/GetGender.php');
    $optionsGender = json_decode($dataGender, true);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Examen semestral - Inicio</title>
    
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body >








</body>