<?php
    error_reporting(0);
    
    
    // On vérifie

    session_start();
    $_SESSION["nom1"]=$_POST['nom1'];
    $_SESSION["prenom1"]=$_POST['prenom1'];
    $_SESSION["tel1"]=$_POST['tel1'];
    $_SESSION["adresse1"]=$_POST['adresse1'];
    $_SESSION["nom2"]=$_POST['nom2'];
    $_SESSION["prenom2"]=$_POST['prenom2'];
    $_SESSION["tel2"]=$_POST['tel2'];
    $_SESSION["adresse2"]=$_POST['adresse2'];

    error_reporting(E_ALL);
    require('../connexion_bdd.php');
    ini_set("display_errors",1);
    contact1($_POST['nom1'],$_POST['prenom1'], $_POST['tel1'], $_POST['adresse1'], $_SESSION["ID"]);
    if ($_POST['same']!='on'){
        contact2($_POST['nom2'],$_POST['prenom2'], $_POST['tel2'], $_POST['adresse2'], $_SESSION["ID"]);
    }
?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/Documents.css">
    <link rel="stylesheet" href="../style.css">
    <title>Document</title>
</head>
<body>

    <div class="forme">
        <h2>Nous vous remercions de bien vouloir remplir avec attention ce formulaire</h2>
        <div class="circle-container">
            <div>
                <div class="inner-circle plein"></div>
            </div>
            <div class="circle-content">
                <hr>
            </div>
            <div>
                <div class="inner-circle plein"></div>
            </div>
            <div class="circle-content">
                <hr>
            </div>
            <div>
                <div class="inner-circle plein"></div>
            </div>
            <div class="circle-content">
                <hr>
            </div>
            <div>
                <div class="inner-circle plein"></div>
            </div>
            <div class="circle-content">
                <hr>
            </div>
            <div>
                <div class="inner-circle"></div>
            </div>
        </div>
        <div class= "textContainer">
            <p>Patient</p>
            <p>Admission</p>
            <p>Couverture sociale</p>
            <p>Contacts</p>
            <p>Documents</p>

        </div>
    </div>
    <div class="corps2">
        <div class="test">
            <!--<center>
                <h1>Pièces à joindre</h1>
                <br>
                <label>(Format jpg, png ou pdf)</label>
            </center>-->

            <form method="POST" action="resume.php" enctype="multipart/form-data">

                <div class="uploads">
                    <div class="doc">
                        <label>Carte d'identité (recto / verso)</label>
                        <input type="file" name="uploadfile1" accept=".jpg, .png, .pdf"/>
                    </div>
                    <div class="doc">
                        <label>Carte de mutuelle</label>
                        <input type="file" name="uploadfile2" accept=".jpg, .png, .pdf">
                    </div>
                </div>
                <div class="uploads">
                    <div class="doc">
                        <label>Carte vitale</label>
                        <input type="file" name="uploadfile3" accept=".jpg, .png, .pdf">
                    </div>
                    <div class="doc">
                        <label>Livret de famille pour enfants mineurs</label>
                        <input type="file" name="uploadfile4" accept=".jpg, .png, .pdf">
                    </div>
                </div>
                <input type=submit name=valider>
                <!--<button onclick="window.location.href = 'pages_personnes.php';">Précédent</button>
                <button class="btnValider" type="submit" onclick="window.location.href = '';" name="upload">Valider</button>-->
            </form>
        </div>
    </div>
</body>
</html>