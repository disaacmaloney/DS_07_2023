<?php
    session_start();
    if(array_key_exists('formLogin', $_POST)){
        $user = $_POST['txtUser'];
        $password = $_POST['txtPassword'];

        $dataNewUser = array(
            'user' => $user,
            'password' => $password
        );

        $jsonDataNewLogin = json_encode($dataNewUser);

        $url = 'http://localhost/DS_07_2023/semestral/apis/Login/login.php';

        $ch = curl_init($url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $jsonDataNewLogin);
        curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type:application/json'));
        $response = curl_exec($ch);
        curl_close($ch);

        $response = json_decode($response, true);
        //se valida que el array no sea nulo
        if($response === null){
            echo 'Error al obtener los datos';
        }
        elseif(count($response) > 0)
        {
            $dataNewLogin = array(
                'USE_USER' => $user,
                'ID_USER' => $response[0]['ID_USER'], 
                'USE_NAME' => $response[0]['USE_NAME'],
                'USE_LASTNAME' => $response[0]['USE_LASTNAME'],
                'USE_DATE_BIRTH' => $response[0]['USE_DATE_BIRTH'],
                'ID_ROLE' => $response[0]['ID_ROLE']

            );

            $_SESSION['sessionUserLogin']  = $dataNewLogin;
            header("Location: Index.php");
            
        }
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Examen semestral - Login</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-[#F4F7FF]">
<section class="py-20 lg:py-[120px]">
    <div class=" max-w-[525px] mx-auto text-center bg-white rounded-lg relative overflow-hidden  sm:px-12 md:px-[60px]">
       <div class="mb-10 md:mb-16 text-center pt-10">
          <a href="javascript:void(0)" class="inline-block max-w-[160px] mx-auto" >
            <img src="#" alt="logo" />
          </a>
       </div>
       <form action="login.php" method="post" >
            <div class="mb-6">
                <p>Ingrese su usuario y contraseña para iniciar sesión</p>
            </div>
            <div class="mb-6">
               <input type="text" name="txtUser" placeholder="Usuario" class=" w-full rounded-md border bordder-[#E9EDF4] py-3 px-5 bg-[#FCFDFE] text-base text-body-color placeholder-[#ACB6BE] outline-none focus:outline-none focus:ring-2 focus:ring-green-300 dark:focus:ring-green-800" />
            </div>
            <div class="mb-6">
               <input type="password" name="txtPassword" placeholder="Contraseña" class=" w-full rounded-md border bordder-[#E9EDF4] py-3 px-5 bg-[#FCFDFE] text-base text-body-color placeholder-[#ACB6BE] outline-none focus:outline-none focus:ring-2 focus:ring-green-300 dark:focus:ring-green-800 " />
            </div>
            <div class="mb-10">
               <input type="submit" name="formLogin" value="Sign In" class="w-full focus:outline-none text-white bg-green-700 hover:bg-green-800 focus:ring-4 focus:ring-green-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 dark:bg-green-600 dark:hover:bg-green-700 dark:focus:ring-green-800"/>
            </div>
       </form>
    </div>
</section>
</body>
</html>