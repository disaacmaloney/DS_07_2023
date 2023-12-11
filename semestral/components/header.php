<?php
    require_once("../components/sessionStart.php");

    $url = 'http://localhost/DS_07_2023/semestral/apis/';

    $dataMenu = file_get_contents($url . 'Menu/GetMenu.php');
    $optionsMenu = json_decode($dataMenu, true);
    $sessionUserLogin = $_SESSION['sessionUserLogin'];

    $dataNewMenu = array(
        'ID_ROLE' => $sessionUserLogin['ID_ROLE']
    );

    $jsonDataNewMnu = json_encode($dataNewMenu);


    $ch = curl_init($url . 'Menu/GetMenu.php');
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_POSTFIELDS, $jsonDataNewMnu);
    curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type:application/json'));
    $response = curl_exec($ch);
    curl_close($ch);
    $response = json_decode($response, true);

    print_r($response);

        
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

<nav class="sticky top-0 bg-gray-100 shadow-md p-4 border-gray-200">
    <div class="items-center font-medium font-bold justify-between hidden w-full md:flex md:w-auto" id="navbar-cta">
        <div>
            <ul class="flex-row flex space-x-8 mt-0 text-xl font-bold text-green-800">
                <li>
                    <p>Examen semestral</p>
                </li>
            </ul>
        </div>
        <div>
            <ul class="flex-row flex space-x-2 mt-0 text-xl font-bold text-green-800">
                <li>
                    <a href="index.php" class=" hover:bg-green-800 hover:text-white hover:rounded-lg border-b border-gray-100 border-0 block pl-3 pr-4 py-2">Inicio</a>
                </li>
                <?php
                    if (count($response) > 0){
                        foreach ($response['records'] as $lstMenu){
                            echo "<li>";
                            echo "<button id='dropdownNavbarLink' data-dropdown-toggle='dropdownNavbar' class='hover:bg-green-800 hover:text-white hover:rounded-lg border-b border-gray-100 pl-3 pr-4 py-2 flex items-center justify-between w-full'>" . $lstMenu['MEN_NAME'] . " <svg class='w-4 h-4 ml-1' fill='currentColor' viewBox='0 0 20 20' xmlns='http://www.w3.org/2000/svg'><path fill-rule='evenodd' d='M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z' clip-rule='evenodd'></path></svg></button>";
                            echo "<div id='dropdownNavbar' class='hidden bg-white text-base z-10 list-none divide-y divide-gray-100 rounded shadow my-4 w-44'>";
                            echo "<ul class='py-1' aria-labelledby='dropdownLargeButton'>";
                            foreach ($lstMenu['subMenu'] as $lstSubsMenus) {
                                print_r($lstMenu['subMenu'] );
                                echo "<li>";
                                echo "<a href='" . $lstSubsMenus['MEN_URL'] . "' class='text-sm hover:bg-green-800 hover:text-white block px-4 py-2'>" . $lstSubsMenus['MEN_NAME'] ."</a>"; 
                                echo "</li>";
                            }
                           echo "</ul>";
                           echo "</div>";
                           echo "</li>";
                        
                        }
                    }
                ?>
                <li>
                    <a href="logout.php" class=" hover:bg-green-800 hover:text-white hover:rounded-lg border-b border-gray-100 border-0 block pl-3 pr-4 py-2">Cerrar sesión</a>
                </li>
            </ul>
        </div>
        <div>
            <ul class="flex-row flex space-x-8 mt-0 text-xl font-bold text-green-800">
                <li>
                    <?php
                        $sessionUserLogin = $_SESSION['sessionUserLogin'];
                        echo "<a href='#' class='border-b border-gray-100 border-0 block pl-3 pr-4 py-2'>" .  $sessionUserLogin['USE_NAME'] . " "  . $sessionUserLogin['USE_LASTNAME'] . "</a>";
                    ?>
                </li>
            </ul>
        </div>
    </div>
</nav>
 
<div class="p-5" >
