<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../style.css">
    <link rel="stylesheet" href="css/Admission.css">
</head>
<body>
    <?php
        session_start();
        $_SESSION["civilite"]=$_POST["civilite"];
        $_SESSION["nomNaiss"]=$_POST["nomNaiss"];
        $_SESSION["nomEpous"]=$_POST["nomEpous"];
        $_SESSION["prénom"]=$_POST["prénom"];
        $_SESSION["dateNaiss"]=$_POST["dateNaiss"];
        $_SESSION["address"]=$_POST["address"];
        $_SESSION["CP"]=$_POST["CP"];
        $_SESSION["ville"]=$_POST["ville"];
        $_SESSION["email"]=$_POST["email"];
        $_SESSION["tel"]=$_POST["tel"];
        error_reporting(E_ALL);
        require('../connexion_bdd.php');
        ini_set("display_errors",1);
        patient($_POST["civilite"], $_POST["nomNaiss"], $_POST["nomEpous"], $_POST["prénom"], $_POST["dateNaiss"], $_POST["majeur"], $_POST["address"], $_POST["CP"], $_POST["ville"], 
        $_POST["email"], $_POST["tel"]);
    ?>
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
                <div class="inner-circle"></div>
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
            <form action=Couverture_sociale.php method=post>
                    <label for="pre-admission">Pre-admission :</label><br>
                    <select name="pre-admission" required>
                        <option class="indispo" selected disabled value="">selectionner une admission</option>
                        <option value="ambu">Ambulatoire chirurgie</option>
                        <option value="hospitalisaton">Hospitalisation (au moins une nuit)</option>
                    </select><br>
                <div class="DH">
                    <div class="date">
                        <label for="date">Date d'hospitalisation</label><br>
                        <input type=date name=date class=date2 required>
                    </div>
                    <div class="horaire">
                        <label for="heure">Heure de l'intervention</label><br>
                        <input type=time name=heure class= horaire2 required><br>
                    </div>
                </div>
                <label for="doc">Nom du médecin</label><br>
                <select name="doc" required>
                    <option class="indispo" selected disabled value="">docteur</option>
                    <?php
                        $doc=doc();
                    ?>
                </select><br><br>
                <input type=submit name=valider>
            </form>
        </div>
    </div>
</body>
</html>