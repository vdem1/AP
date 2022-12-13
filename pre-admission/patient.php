<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="patient.css">
</head>
<body>
    <div class="test">
        <form action = "pré-admission.php" method="post">
            <div class="ligne">
                <div class="espace">
                    <label for="civilite">civilité :</label><br>
                    <select id=civilite name="civilite" required>
                        <opton value="" selected>civilité</option>
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
                <div class="espace2">
                    <label for='prénom'>Prénom : </label>
                    <input type=texte name="prénom" required>
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
                    <input type=texte name="email" required>
                </div>
                <div class="espace">
                    <label for='tel'>Téléphone : </label>
                    <input type=texte name="tel" required>
                </div>
            </div>
            <input type=submit name=valider>
        </form>
    </div>
</body>
</html>