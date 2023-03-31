<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../style.css">
    <script src="https://www.google.com/recaptcha/api.js"></script>
    <title>Document</title>
</head>
<body>
    <nav>
        <?php
        session_start();
            echo $_SESSION['nom']." ".$_SESSION['prenom']
        ?>
    </nav>
    <div class="corps">
        <a href="patient.php">
            Nouvelle pré-admission
            <img src="image/croix_verte.png">
        </a>
        <a href="liste.php"> 
            Liste des pré-admissions
            <img src="image/liste.png">
        </a>

    </div>
</body>
</html>