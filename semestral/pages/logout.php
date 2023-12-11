<?php
    require_once("../components/sessionStart.php");

    unset($_SESSION['sessionUserLogin']);
    header("Location: Index.php");
?>