<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>

    <div class="form-popup1" id="myForm">
        <form action="" class="form-container" method="post" id="form">
            <h1>Ajouter un médecin</h1>

            <label for="service"><b>Prénom du médecin </b></label>
            <input type="text" placeholder="Prénom du médecin" name="prenom" required>

            <label for="idchef"><b>Nom du médecin</b></label>
            <input type="text" placeholder="Nom du médecin" name="nom" required>

            <label for="idchef"><b>Identifiant du médecin</b></label>
            <input type="text" placeholder="Identifiant" name="identifiant" required>

            <label for="idchef"><b>Mot de passe du médecin</b></label>
            <input type="text" placeholder="Mot de passe" name="mdp" required>

            <label for="idchef"><b>ID du service</b></label>
            <input type="text" placeholder="Service" name="Service" required>


            <button type="submit" form="form" class="btn" value="Submit">Ajouter</button>
            <input type="hidden" name="f_inf" />
            <button type="button" class="btn cancel" onclick="closeForm1()">Annuler</button>
        </form>

        <?php

$db = mysqli_connect("localhost:3306", "slam", "root", "hopital");

            $query1 = "SELECT max(IDPersonnel) AS lastID from personnel";

if ($result1 = mysqli_query($db, $query1)) {
    if (mysqli_num_rows($result1) > 0) {
        while ($row1 = mysqli_fetch_array($result1)) {

                                    $res1 = $row1["lastID"];

        }
    }
}




        if (isset($_POST['f_inf'])) {

            $servername = "localhost:3306";
            $username = "slam";
            $password = "root";
            $dbname = "hopital";

            $conn = new mysqli($servername, $username, $password, $dbname);


            $prenom = $_POST['prenom'];

            $nom = $_POST['nom'];

            $identifiant = $_POST['identifiant'];

            $mdp = $_POST['mdp'];

            $Service = $_POST['Service'];


            $role = 2;

                        echo ' le dernier id est : ' . $res1;

                        $res1 = (int)$res1;
                        $res1 = $res1 + 1;


                        echo '<br/> Nouveau dernier id : ' .$res1;

                        echo '</br>' . $prenom . '</br>' . $nom . '</br>' . $identifiant . '</br>' . $mdp . '</br>' . $Service . '</br>';

                        $sql = "INSERT INTO personnel (IDPersonnel, IDService, Nom, Prenom, identifiant, mdp, Role) VALUES ('$res1','$Service','$nom','$prenom','$identifiant','$mdp','$role')";


                        echo $sql;

                        if ($conn->query($sql) === TRUE) {

                            echo 'reussi';
                        } else {
                            echo 'failedd';
                        }
                        $conn->close();
                    }
                //}
            //}
        //}

        ?>

</body>

</html>