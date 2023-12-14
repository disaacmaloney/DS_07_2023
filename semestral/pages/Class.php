<?php
    require_once("../components/header.php");
    $url = 'http://localhost/DS_07_2023/semestral/apis/';

    $dataRole = file_get_contents($url . 'Class/GetClass.php');
    $optionsClass = json_decode($dataRole, true);
?>
    <div class="block w-full rounded-lg bg-white  shadow-[0_2px_15px_-3px_rgba(0,0,0,0.07),0_10px_20px_-2px_rgba(0,0,0,0.04)]">
    <div  class="border-b-2 border-neutral-100 px-3 pt-3 text-center">
        <h5 class="mb-2 text-xl font-medium leading-tight text-neutral-800 ">
            Consulta de Usuario
        </h5>
    </div>
    <div class="p-6">
        <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
            <table class="w-full text-sm text-left rtl:text-right text-gray-500 ">
                <thead class="text-xs text-gray-700 uppercase bg-gray-50  ">
                    <tr>
                        <th scope="col" class="px-6 py-3">
                            COD DE CLASE
                        </th>
                        <th scope="col" class="px-6 py-3">
                            NOMBRE DE CLASE
                        </th>
                    </tr>
                </thead>
                <tbody>

                    <?php
                    
                    foreach($optionsClass['records'] as $User) {
                        echo '<tr class="odd:bg-white even:bg-gray-50 eborder-b ">
                                <td class="px-6 py-4">
                                '.$User['CLA_COD'].'
                                </td>
                                <td class="px-6 py-4">
                                    '.$User['CLA_NAME'].'
                                </td>
                            </tr>';
                    }
                    

                    ?>
                </tbody>
            </table>
        </div>
    </div>
</div>


<?php
    require_once("../components/footer.php");
?>


<?php
    require_once("../components/end.php");
?>