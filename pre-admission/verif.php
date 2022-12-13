<?php
    error_reporting(E_ALL);
    require('connexion_bdd.php');
    ini_set("display_errors",1);
    $result=account($_POST['name'], $_POST['password']);

    if (empty($result)){
        echo '<script> window.location.replace("connexion.php")</script>';
    }
    switch ($result){
        case 1:
            echo '<script>window.location.replace("patient.php")</script>';
            break;
        case 2:
            echo '<script>window.location.replace("admin.php")</script>';
            break;
    }

?>