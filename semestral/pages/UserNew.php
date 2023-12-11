<?php
    require_once("../components/header.php");

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

<div class="block w-full rounded-lg bg-white  shadow-[0_2px_15px_-3px_rgba(0,0,0,0.07),0_10px_20px_-2px_rgba(0,0,0,0.04)]">
    <form action="UserNew.php" method="post">
        <div  class="border-b-2 border-neutral-100 px-3 pt-3 text-center">
            <h5 class="mb-2 text-xl font-medium leading-tight text-neutral-800 ">
        Registrio de Usuario
            </h5>
        </div>
        <div class="p-6">
            
            <div class="grid grid-cols-4 gap-3">
                <div class="relative z-0 w-full mb-5 group">
                    <label for="txt_use_name" class="block mb-2 text-sm font-medium text-gray-900 ">Nombre</label>
                    <input  id="txt_use_name" name="txt_use_name" class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-green-500 focus:border-green-500 block w-full p-2.5 "  >
                </div>
                <div class="relative z-0 w-full mb-5 group">
                    <label for="txt_use_lastName" class="block mb-2 text-sm font-medium text-gray-900 ">Apellido</label>
                    <input  id="txt_use_lastName"  name="txt_use_lastName" class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-green-500 focus:border-green-500 block w-full p-2.5 "  >
                </div>
                <div class="relative z-0 w-full mb-5 group">
                    <label for="txt_use_user" class="block mb-2 text-sm font-medium text-gray-900 ">Usuario</label>
                    <input  id="txt_use_user" name="txt_use_user" class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-green-500 focus:border-green-500 block w-full p-2.5 "  >
                </div>
                <div class="relative z-0 w-full mb-5 group">
                    <label for="ddl_id_role" class="block mb-2 text-sm font-medium text-gray-900 ">Rol</label>
                    <select id="ddl_id_role" name="ddl_id_role" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-green-500 focus:border-green-500 block w-full p-2.5 ">
                        <?php
                            foreach ($optionsRole['records'] as $Role) {
                                echo '<option value="'.$Role['ID_ROLE'].'">'.$Role['ROL_NAME'].'</option>';
                            }
                        ?>
                    </select>    
                </div>
            </div>
            <div class="grid grid-cols-4 gap-3">
                <div class="relative z-0 w-full mb-5 group">
                    <label for="txt_password" class="block mb-2 text-sm font-medium text-gray-900 ">Contraseña</label>
                    <input  id="txt_password" name="txt_password" type="password"  class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-green-500 focus:border-green-500 block w-full p-2.5 "  >
                </div>
                <div class="relative z-0 w-full mb-5 group">
                    <label for="txt_bithDays" class="block mb-2 text-sm font-medium text-gray-900 ">Fecha de nacimiento</label>
                    <input  id="txt_bithDays" name="txt_bithDays" type="date"  class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-green-500 focus:border-green-500 block w-full p-2.5 "  >
                </div>
                <div class="relative z-0 w-full mb-5 group">
                    <label for="ddl_id_gender" class="block mb-2 text-sm font-medium text-gray-900 ">Genero</label>
                    <select id="ddl_id_gender" name="ddl_id_gender" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-green-500 focus:border-green-500 block w-full p-2.5 ">
                        <?php
                            foreach ($optionsGender['records'] as $Gender) {
                                echo '<option value="'.$Gender['ID_PARAMETER'].'">'.$Gender['PAR_VALUE'].'</option>';
                            }
                        ?>
                    </select>               
                </div>
            </div>
        
        </div>
        <div class="flex items-center justify-center px-6 py-4 space-x-3">
            <button type="button" onclick="window.location.href='index.php'" class="inline-flex items-center justify-center w-20 h-10 text-sm font-medium text-gray-900 bg-white border border-gray-300 rounded-md shadow-sm hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-green-500">
                Cancelar
            </button>
            <button type="submit" name="formNewUser" class="inline-flex items-center justify-center px-4 py-2 text-sm font-medium text-white bg-green-700 border border-transparent rounded-md shadow-sm hover:bg-green-800 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-green-500">
                Guardar
            </button>
        </div>
    </form>
</div>

<?php
    require_once("../components/footer.php");
?>


<?php
    require_once("../components/end.php");
?>