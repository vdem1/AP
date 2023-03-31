<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../style.css">
    <link rel="stylesheet" href="css/couverture_sociale.css">
</head>
<body>
    <?php
        session_start();
        $_SESSION["pre-admission"]=$_POST["pre-admission"];
        $_SESSION["date"]=$_POST["date"];
        $_SESSION["heure"]=$_POST["heure"];
        $_SESSION["doc"]=$_POST["doc"];
        error_reporting(E_ALL);
        require('../connexion_bdd.php');
        ini_set("display_errors",1);
        $id=id();
        $_SESSION['ID']=$id;
        admission($id, $_POST["doc"], $_POST["date"], $_POST["heure"], $_POST["pre-admission"]);
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
            <form action="Contacts.php" method=post>
                <div >
                    <lable for=caisseAssu>Organisme de sécurité social / Nom de la caisse d'assurance maladie</label>
                    <input type=text name="caisseAssu" required><br>
                </div>
                <div>
                    <label for=numSecu>Numéro de sécurité sociale</label>
                    <input type=text name="numSecu" required><br>
                </div>
                <div class="boul">
                    <div class="assure">
                        <label for=assuré>Le patient est-il assuré ?</label><br>
                        <select name="assuré" required>
                            <option class="indispo" selected disabled value="">choisir</option>
                            <option value=1>oui</option>
                            <option value=0>non</option>
                        </select>
                    </div>
                    <div class="ALD">
                        <label for=ALDchoix>Le patient est-il en ALD</label><br>
                        <select name="ALDchoix" required>
                            <option class="indispo" selected disabled value="">choisir</option>
                            <option value=1>oui</option>
                            <option value=0>non</option>
                        </select>
                    </div>
                </div>
                <div>
                    <label for=nomMut>Nom de la mutuelle ou de l'assurance</label>
                    <input type=text name="nomMut" required><br>
                </div>
                <div>
                    <label for=numAdherant>numéro d'adhérant</label>
                    <input type=text name="numAdherant" required><br>
                </div>
                <div>
                    <label for=chambrePart>chambre particulière ?</label>
                    <select name="chambrePart" required>
                        <option class="indispo" selected disabled value="">choisir</option>
                        <option value=1>oui</option>
                        <option value=0>non</option>
                    </select>
                </div>
                <input type=submit name=valider>
            </form>
        </div>
    </div>
</body>
</html>