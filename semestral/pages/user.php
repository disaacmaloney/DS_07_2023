<?php
    require_once("../components/header.php");
    $url = 'http://localhost/DS_07_2023/semestral/apis/';

    $dataRole = file_get_contents($url . 'Role/GetRole.php');
    $optionsRole = json_decode($dataRole, true);

    if (array_key_exists('ConsultarFiltros', $_POST)) {
        $dataNewUser = array(
            'ID_ROLE' => $_POST['ddl_id_role']

        );

        $jsonDataNewUser = json_encode($dataNewUser);

        $ch = curl_init($url .'Users/GetUsersByRole.php');
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $jsonDataNewUser);
        curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type:application/json'));
        $response = curl_exec($ch);
        curl_close($ch);

        $optionsUser = json_decode($response, true);
    }
?>
<br>
<form NAME="FormFiltro" METHOD="post" ACTION="user.php">
    <div class="grid grid-cols-3 gap-3">
        <div></div>
        <div class="relative z-0 w-full mb-5 group">
            <label for="ddl_id_role" class="block mb-2 text-sm font-medium text-gray-900 ">Selecione el Rol a consultar:</label>
            <select id="ddl_id_role" name="ddl_id_role" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-green-500 focus:border-green-500 block w-full p-2.5 ">
                <?php
                    foreach ($optionsRole['records'] as $Role) {
                        echo '<option value="'.$Role['ID_ROLE'].'">'.$Role['ROL_NAME'].'</option>';
                    }
                ?>
            </select>    
        </div>
        <div class="flex items-center px-6 py-4 space-x-3">
            <button type="submit" NAME="ConsultarFiltros" class="inline-flex items-center justify-center px-4 py-2 text-sm font-medium text-white bg-green-700 border border-transparent rounded-md shadow-sm hover:bg-green-800 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-green-500">
                Buscar
            </button>
        </div>
    </div>
</form>

<br>

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
                            ID USUARIO
                        </th>
                        <th scope="col" class="px-6 py-3">
                            NOMBRE
                        </th>
                        <th scope="col" class="px-6 py-3">
                            APELLIDO
                        </th>
                        <th scope="col" class="px-6 py-3">
                            USUARIO
                        </th>
                        <th scope="col" class="px-6 py-3">
                            FECHA DE NACIMIENTO
                        </th>
                        <th scope="col" class="px-6 py-3">
                            ROL
                        </th>
                        <th scope="col" class="px-6 py-3">
                            GENERO
                        </th>
                        
                    </tr>
                </thead>
                <tbody>

                    <?php
                    if (array_key_exists('ConsultarFiltros', $_POST)) {
                        foreach($optionsUser['records'] as $User) {
                            echo '<tr class="odd:bg-white even:bg-gray-50 eborder-b ">
                                    <td class="px-6 py-4">
                                    '.$User['ID_USER'].'
                                    </td>
                                    <td class="px-6 py-4">
                                        '.$User['USE_NAME'].'
                                    </td>
                                    <td class="px-6 py-4">
                                        '.$User['USE_LASTNAME'].'
                                    </td>
                                    <td class="px-6 py-4">
                                        '.$User['USE_USER'].'
                                    </td>
                                    <td class="px-6 py-4">
                                        '.$User['USE_DATE_BIRTH'].'
                                    </td>
                                    <td class="px-6 py-4">
                                        '.$User['ROL_NAME'].'
                                    </td>
                                    <td class="px-6 py-4">
                                        '.$User['GENDER_VALUE'].'
                                    </td>
                                </tr>';
                        }
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