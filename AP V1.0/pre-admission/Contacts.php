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
    session_start();
    $_SESSION["caisseAssu"]=$_POST["caisseAssu"];
    $_SESSION["numSecu"]=$_POST["numSecu"];
    $_SESSION["assuré"]=$_POST["assuré"];
    $_SESSION["ALDchoix"]=$_POST["ALDchoix"];
    $_SESSION["nomMut"]=$_POST["nomMut"];
    $_SESSION["numAdherant"]=$_POST["numAdherant"];
    $_SESSION["chambrePart"]=$_POST["chambrePart"];
    error_reporting(E_ALL);
    require('../connexion_bdd.php');
    ini_set("display_errors",1);
    couverture($_POST["numSecu"], $_POST["caisseAssu"], $_POST["assuré"], $_POST["ALDchoix"], $_POST["nomMut"], $_POST["chambrePart"], $_POST["numAdherant"], $_SESSION['ID']);
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/Contacts.css">
    <link rel="stylesheet" href="../style.css">
    <title>Pages_personnes</title>
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
                <div class="inner-circle"></div>
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
    <div class="coprs2">
        <div class="test">
            <form method="POST" action="Documents.php">
                <h2> Coordonnées personne à prévenir </h2>
                <div class="ligne">
                    <div>
                        <label for=text1><b>Nom</b></label>
                        <div class="nom">
                            <input type="text" name="nom1" required>
                        </div>
                    </div>
                    <div>
                        <label for=prenom1><b>Prénom</b></label>
                        <div class="prenom">
                            <input type="text" name="prenom1" required>
                        </div>
                    </div>
                </div>
                <div class="ligne">
                    <div>
                        <label for=tel1><b>Téléphone</b></label>
                        <div class="nom">
                            <input type="text" name="tel1" required>
                        </div>
                    </div>
                    <div>
                        <label for=adresse1><b>Adresse</b></label>
                        <div class="prenom">
                            <input type="text" name="adresse1" required>
                        </div>
                    </div>
                </div>
                <h2> Coordonnées personne de confiance </h2>
                <div class="ligne">
                    <input type="checkbox" name=same>
                    <label for="same">même personne</label>
                </div>
                <div class="ligne">
                    <div>
                        <label for=nom2><b>Nom</b></label>
                        <div class="nom">
                            <input type="text" name="nom2">
                        </div>
                    </div>
                    <div>
                        <label for=prenom2><b>Prénom</b></label>
                        <div class="prenom">
                            <input type="text" name="prenom2">
                        </div>
                    </div>
                </div>
                <div class="ligne">
                    <div>
                        <label for=tel2><b>Téléphone</b></label>
                        <div class="nom">
                            <input type="text" name="tel2">
                        </div>
                    </div>
                    <div>
                        <label for=adresse2><b>Adresse</b></label>
                        <div class="prenom">
                            <input type="text" name="adresse2">
                        </div>
                    </div>
                </div>
                    <!--<button onclick="window.location='informations.php';">Précédent</button>
                    <button class="btnValider" type="submit" onclick="window.location.href = 'pages_piece.php';" name="submit">Valider</button>
                    <input type="reset" />-->
                    <input type=submit name=valider>
            </form>
        </div>
    </div>
</div>
</body>
</html>