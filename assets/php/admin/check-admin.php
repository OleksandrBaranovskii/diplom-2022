<?php
    if (!$_SESSION){
        header('location: ' . BASE_URL . "login.php");
    }
?>