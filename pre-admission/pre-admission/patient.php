<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/patient.css">
    <link rel="stylesheet" href="../style.css">
</head>
<body>
    <div class="forme">
            <h2>Nous vous remercions de bien vouloir remplir avec attention ce formulaire</h2>
        <div class="circle-container">
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
            <form action = "Admission.php" method="post">
                <div class="ligne">
                    <div class="espace">
                        <label for="civilite">civilité :</label><br>
                        <select id=civilite name="civilite" required>
                        <option value="" selected disabled>--selectionner--</option>
                            <option value=1>homme</option>
                            <option value=2>femme</option>
                            <option value=3>autre</option>
                        </select>
                    </div>
                    <div class="espace">
                        <label for='nomNaiss'>Nom de naissance : </label>
                        <input type=texte name="nomNaiss" required>
                    </div>
                    <div class="espace">
                        <label for='nomEpoous'>Nom d'épouse : </label>
                        <input type=texte name="nomEpous">
                    </div>
                </div>
                <div class="ligne">
                    <div class="espace">
                        <label for='prénom'>Prénom : </label>
                        <input type=texte name="prénom" required>
                    </div>
                    <div class="espace">
                        <label for='majeur'>Majeur : </label>
                        <select id=majeur name="majeur" required>
                            <option value="" selected disabled>--selectionner--</option>
                            <option value=1>mineur</option>
                            <option value=0>majeur</option>
                        </select>
                    </div>
                    <div class="espace">
                        <label for='dateNaiss'>Date de naissance : </label>
                        <input class="date" type=date name="dateNaiss" required>
                    </div>
                </div>
                <div>
                    <label for='address'>Adresse : </label>
                    <input type=texte name="address" required>
                </div>
                <div class="ligne">
                    <div class="espace">
                        <label for='CP'>Code postal : </label>
                        <input type=texte name="CP" required>
                    </div>
                    <div class="espace2">
                        <label for='ville'>Ville : </label>
                        <input type=texte name="ville" required>
                    </div>
                </div>
                <div class="ligne">
                    <div class="espace2">
                        <label for='email'>Email : </label>
                        <input type=email name="email" required>
                    </div>
                    <div class="espace">
                        <label for='tel'>Téléphone : </label>
                        <input type=texte name="tel" required>
                    </div>
                </div>
                <input type=submit name=valider>
            </form>
        </div>
    </div>
</body>
</html>