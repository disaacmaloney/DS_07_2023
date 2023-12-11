<?php
    session_start();

    if(!isset($_SESSION['sessionUserLogin'])){
        header("Location: login.php");
    }    
?>