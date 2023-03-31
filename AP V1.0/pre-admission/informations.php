<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../style.css">
    <link rel="stylesheet" href="informations.css">
</head>
<body>
    <?php
        $_SESSION["pre-admission"]=$_POST["pre-admission"];
        $_SESSION["date"]=$_POST["date"];
        $_SESSION["heure"]=$_POST["heure"];
        $_SESSION["doc"]=$_POST["doc"];
    ?>
    <div class="test">
        <form action="pages_personnes.php" method=post>
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
                        <option values="">choisir<option>
                        <option values=1>oui</option>
                        <option values=0>non</option>
                    </select>
                </div>
                <div class="ALD">
                    <label for=ALDchoix>Le patient est-il en ALD</label><br>
                    <select name="ALDchoix" required>
                        <option values="">choisir<option>
                        <option values=1>oui</option>
                        <option values=0>non</option>
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
                    <option values="">choisir<option>
                    <option values=1>oui</option>
                    <option values=0>non</option>
                </select>
            </div>
            <input type=submit name=valider>
    </div>
</body>
</html>