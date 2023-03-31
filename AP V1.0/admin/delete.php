<?php

if (isset($_GET['IDPersonnel'])) {
    $IDPersonnel = $_GET['IDPersonnel'];
    $db = mysqli_connect("localhost:3306", "slam", "root", "hopital");
    $query = "DELETE from personnel WHERE IDPersonnel= $IDPersonnel";

    if (mysqli_query($db, $query)) {
        mysqli_close($db);
        header('Location: pages_admin.php');
        exit;
    } else {
        echo "Erreur";
    }
}
?>