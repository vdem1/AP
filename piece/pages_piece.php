<?php
error_reporting(0);
 
 
// On vérifie
if (isset($_POST['upload'])) {
    if(($_FILES['uploadfile1']['size'] > 0) && ($_FILES['uploadfile2']['size'] > "0") && ($_FILES['uploadfile3']['size'] > 0) && ($_FILES['uploadfile4']['size'] > 0)) {
        $filename = $_FILES["uploadfile1"]["name"];
        $filename2 = $_FILES["uploadfile2"]["name"];
        $filename3 = $_FILES["uploadfile3"]["name"];
        $filename4 = $_FILES["uploadfile4"]["name"];

        $tempname = $_FILES["uploadfile1"]["tmp_name"];
        $tempname2 = $_FILES["uploadfile2"]["tmp_name"];
        $tempname3 = $_FILES["uploadfile3"]["tmp_name"];
        $tempname4 = $_FILES["uploadfile4"]["tmp_name"];

        $folder = "./image/" . $filename;
        $folder2 = "./image/" . $filename2;
        $folder3 = "./image/" . $filename3;
        $folder4 = "./image/" . $filename4;


        // Connexion
        $db = mysqli_connect("localhost", "root", "bjKT8pkdmkJZLX", "ap");
 
        // On récupère tout et on les ajoute dans la BDD
        $sql = "INSERT INTO document (CarteID,CarteVitale, Mutuelle, LivretFamille) VALUES ('$folder','$folder2','$folder3','$folder4')";

        // Requête
        mysqli_query($db, $sql);

 
        // On bouge toutes les images dans le dossier image
        if((move_uploaded_file($tempname, $folder)) && (move_uploaded_file($tempname2, $folder2)) && (move_uploaded_file($tempname3, $folder3)) && (move_uploaded_file($tempname4, $folder4))) {
            echo "<h3>  successful!</h3>";
        } else {
            echo "<h3>  Failed to upload!</h3>";
        }
    } else {
        echo "<h3> Vide</h3>";
    }
}
?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="pages_piece_css.css">
    <title>Document</title>
</head>
<body>

    <div class="forme">
        <h2>Nous vous remercions de bien vouloir remplir avec attention ce formulaire</h2>
        <div class="circle-container">
            <div class="inner-circle"></div>
                <div class="circle-content">
                    <br>
                    <br>
                    <hr>
                    <br>
                    <p>Hospitalisation</p>
                </div>
            <div class="inner-circle"></div>
                <div class="circle-content">
                    <br>
                    <br>
                    <hr>
                    <br>
                    <p>Patient</p>
                </div>
            <div class="inner-circle"></div>
                <div class="circle-content">
                    <br>
                    <br>
                    <hr>
                    <br>
                    <p>Couverture sociale</p>
                </div>
            <div class="inner-circle"></div>
                <div class="circle-content">
                    <br>
                    <br>
                    <hr>
                    <br>
                    <p>Document</p> 
                </div>
                <div class="inner-circle"></div>
        </div>
        <br>
        <h1>Pièces à joindre</h1>
        <label>(Format jpg, png ou pdf)</label>
        <br>
        <br>

        <form method="POST" action="" enctype="multipart/form-data">
            <br>
            <label>Carte d'identité (recto / verso)</label>
            <br>
            <input type="file" name="uploadfile1" accept=".jpg, .png, .pdf"/>



            <br>
            <label>Carte de mutuelle</label>
            <br>
            <input type="file" name="uploadfile2" accept=".jpg, .png, .pdf">



            <br>
            <label>Carte vitale</label>
            <br>
            <input type="file" name="uploadfile3" accept=".jpg, .png, .pdf">


            <br>
            <label>Livret de famille pour enfants mineurs</label>
            <br>
            <input type="file" name="uploadfile4" accept=".jpg, .png, .pdf">


            <br>


            <button onclick="window.location.href = 'pages_personnes.php';">Précédent</button>
            <button class="btnValider" type="submit" onclick="window.location.href = '';" name="upload">Valider</button>
        </div>
    </form>
</body>
</html>