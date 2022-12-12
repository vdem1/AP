<?php
error_reporting(0);
 
//$db = mysqli_connect("localhost", "root", "bjKT8pkdmkJZLX", "ap");

$nom1 = $_POST['nom1'];
$prenom1 = $_POST['prenom1'];
$tel1 = $_POST['tel1'];
$adresse1 = $_POST['adresse1'];

$nom2 = $_POST['nom2'];
$prenom2 = $_POST['prenom2'];
$tel2 = $_POST['tel2'];
$adresse2 = $_POST['adresse2'];

if (isset($_POST['submit'])) {

    if(!empty($nom1) && !empty($prenom1) && !empty($tel1) && !empty($adresse1) && !empty($nom2) && !empty($prenom2) && !empty($tel2) && !empty($adresse2)){

        echo 'rempli';

        $db = mysqli_connect("localhost", "root", "bjKT8pkdmkJZLX", "ap");    

        $sql1 = "INSERT INTO contact (Nom, Prenom, tel, Adresse, IDContact) VALUES ('$nom1', '$prenom1', '$tel1', '$adresse1')";
        $sql2 = "INSERT INTO contact (Nom, Prenom, tel, Adresse, IDContact) VALUES ('$nom2', '$prenom2', '$tel2', '$adresse2')";

        if(mysqli_query($db, $sql1,$sql2)){

            echo 'envoyé en bdd';

        } else {

            echo 'pas envoyé (à cause de lid)';
        }


    } else {
        echo 'vide';
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="pages_personnes_css.css">
    <title>Pages_personnes</title>
</head>
<body>
    <div class="forme">
    <h1>Couverture sociale</h2>
    <h2> Coordonnées personne à prévenir </h2>
    <form method="POST" action="" enctype="multipart/form-data">
        <label><b>Nom</b></label>
        <br>
        <input type="text" name="nom1">
        <br>
        <label><b>Prénom</b></label>
        <br>
        <input type="text" name="prenom1">
        <br>
        <label><b>Téléphone</b></label>
        <br>
        <input type="text" name="tel1">
        <br>
        <label><b>Adresse</b></label>
        <br>
        <input type="text" name="adresse1">
        <br>
<br>
<br>
<br>
<h2> Coordonnées personne de confiance </h2>
<label><b>Nom</b></label>
        <br>
        <input type="text" name="nom2">
        <br>
        <label><b>Prénom</b></label>
        <br>
        <input type="text" name="prenom2">
        <br>
        <label><b>Téléphone</b></label>
        <br>
        <input type="text" name="tel2">
        <br>
        <label><b>Adresse</b></label>
        <br>
        <input type="text" name="adresse2">
        <br>
        <button onclick="window.location='pages_informations.php';">Précédent</button>
        <button class="btnValider" type="submit" onclick="window.location.href = '';" name="submit">Valider</button>
        <input type="reset" />
        </form>
</div>
</body>
</html>