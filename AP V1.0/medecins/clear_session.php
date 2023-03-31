<?php
unset($_SESSION['nom']);
unset($_SESSION['prenom']);
unset($_SESSION['role']);
session_destroy();
header('Location: ../index.php');
exit();
?>