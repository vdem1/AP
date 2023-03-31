<!DOCTYPE html>
<html lang="en">

<?php
session_start();

$db = mysqli_connect("localhost:3306", "slam", "root", "hopital");
$query = "SELECT NomService FROM service INNER JOIN personnel ON service.IDChef = personnel.IDPersonnel WHERE IDPersonnel=2";
if ($result = mysqli_query($db, $query)) {
    if (mysqli_num_rows($result) > 0) {
        while ($row = mysqli_fetch_array($result)) {
            $nomservice = $row["NomService"];
        }
    }
}


?>



<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script type="text/javascript" src="adminJS.js"></script>
    <link rel="stylesheet" href="style_medecins.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
        integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">
    <title>Document</title>
</head>

<body>

    <div class="header">

        <a style="text-decoration: none" class="active" href="../medecins/pages_medecins.php">Médecins</a>
        <a style="text-decoration: none" href="../pre-admissions/pages_pre-admissions.php">Vos pré-admissions</a>
        <a style="text-decoration: none" href="pages_statistiques.php">Vos statistiques</a>
        <div class="header-right">
            <form action="clear-session.php" method="POST">
                <a style="display: inline; border-color: #5dc99f; border-style:solid; border-radius:8px; background-color: #5dc99f; color: white; text-decoration: none;"
                    class="deconnexion" href="../../index.php" type="submit">Déconnexion</a>
            </form>
        </div>
    </div>

    <div class="main">
        <h1>Bienvenue sur le panel médecin de la LPF Clinique ! </h1>
        <p>Connecté en tant que :
            <?php echo $_SESSION['prenom'] . ' ' . $_SESSION['nom']; ?>
            <br>
            <br>
        <h2>Vous êtes affecté au service :
            <?php echo $nomservice; ?>
        </h2>
    </div>
</body>

</html>