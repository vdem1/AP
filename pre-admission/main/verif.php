<?php
    session_start();
    error_reporting(E_ALL);
    require('connexion_bdd.php');
    ini_set("display_errors",1);
    $stmt=account($_POST['name'], $_POST['password']);
    while ($row=$stmt->fetch()){
        $role=$row['role'];
        $_SESSION['nom']=$row['nom'];
        $_SESSION['prenom']=$row['prenom'];
    }

    if (empty($role)){
        echo '<script> window.location.replace("index.php")</script>';
    }
    switch ($role){
        case 1:
            echo '<script>window.location.replace("pre-admission/menu.php")</script>';
            break;
        case 2:
            echo '<script>window.location.replace("medecins/pages_medecins.php")</script>';
            break;
        case 3:
            echo '<script>window.location.replace("admins/admin/pages_admin.php")</script>';
            break;
    }

?>
