<!DOCTYPE html>
<html lang="en">

<?php
session_reset();
session_start();

$req = "SELECT NomService from service";
$db = mysqli_connect("localhost:3306", "slam", "root", "hopital");

$resservice = mysqli_query($db,$req);


?>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script type="text/javascript" src="adminJS.js"></script>
    <link rel="stylesheet" href="style_admin.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
        integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">
    <title>Document</title>

    <style>
        .form-popup1 {
            display: none;
            position: fixed;
            bottom: 0;
            right: 15px;
            border: 3px solid #f1f1f1;
            z-index: 9;
        }

        /* The popup form - hidden by default */
        .form-popup2 {
            display: none;
            position: fixed;
            bottom: 0;
            right: 15px;
            border: 3px solid #f1f1f1;
            z-index: 9;
        }

        /* Add styles to the form container */
        .form-container {
            max-width: 300px;
            padding: 10px;
            background-color: white;
        }

        /* Full-width input fields */
        .form-container input[type=text] {
            width: 100%;
            padding: 15px;
            margin: 5px 0 22px 0;
            border: none;
            background: #f1f1f1;
        }

        /* When the inputs get focus, do something */
        .form-container input[type=text]:focus {
            background-color: #ddd;
            outline: none;
        }

        /* Set a style for the submit/login button */
        .form-container .btn {
            background-color: #04AA6D;
            color: white;
            padding: 16px 20px;
            border: none;
            cursor: pointer;
            width: 100%;
            margin-bottom: 10px;
            opacity: 0.8;
        }

        /* Add a red background color to the cancel button */
        .form-container .cancel {
            background-color: red;
        }

        /* Add some hover effects to buttons */
        .form-container .btn:hover,
        .open-button:hover {
            opacity: 1;
        }
    </style>
</head>

<body>

    <div class="header">

        <a style="text-decoration: none" class="active" href="">Panel admin</a>
        <a style="text-decoration: none" href="../pre-admissions/pages_pre-admissions.php">Pré-admissions</a>
        <div class="header-right">
            <form action="clear-session.php" method="POST">
                <a style="display: inline; border-color: #5dc99f; border-style:solid; border-radius:8px; background-color: #5dc99f; color: white; text-decoration: none;"
                    class="deconnexion" href="../../index.php" type="submit">Déconnexion</a>
            </form>
        </div>
    </div>

    <div class="main">

        <h1>Bienvenue sur le panel administrateur de la LPF Clinique ! </h1>

        <p>Connecté en tant que :
            <?php echo $_SESSION['prenom'] . ' ' . $_SESSION['nom']; ?>
        </p>

        <br>
        <br>

        <h2>Médecins :</h2>

        <table class="styled-table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nom</th>
                    <th>Prénom</th>
                    <th>Service</th>
                    <th>Rôle</th>
                    <th>Supprimer</th>
                    <th>Modification</th>
                </tr>
            </thead>
            <tbody>
                <?php

                //Serveur
                $db = mysqli_connect("localhost:3306", "slam", "root", "hopital");
                $query = "SELECT IDPersonnel, Nom, Prenom, NomService, Role FROM personnel, service, role WHERE Role=2 GROUP BY IDPersonnel";

                //Localhost
                //$db = mysqli_connect("localhost:3306","root", "bjKT8pkdmkJZLX","ap");
                //$query = "SELECT Nom, Prenom, NomService, Role FROM personnel, service WHERE Role=2 GROUP BY Nom";
                if ($result = mysqli_query($db, $query)) {
                    if (mysqli_num_rows($result) > 0) {
                        while ($row = mysqli_fetch_array($result)) {
                            
                            echo '<tr>';
                            echo '<td>' . $row["IDPersonnel"] . '</td>';
                            echo '<td>' . $row["Nom"] . '</td>';
                            echo '<td>' . $row["Prenom"] . '</td>';
                            echo '<td>' . $row["NomService"] . '</td>';
                            echo '<td>' . $row["Role"] . '</td>';
                            echo "<td><a style='text-decoration: none' type='button' href='delete.php?IDPersonnel=".$row['IDPersonnel']."'>Retirer le
                            médecin</a> </td>";
                            echo '<td><button style="text-decoration: none" type="button" onclick="confirmFunctionMedecin()">Modifier le médecin</button> </td>';
                            echo '</tr>';
                        }
                    }
                }   
                ?>
                <tr class="active-row">
                </tr>
                <!-- and so on... -->
            </tbody>
        </table>


        <button class="open-button" onclick="openForm1()">Ajouter un medecin</button>
        <!--<button style="text-decoration: none" type="button" onclick="confirmFunctionMedecin()">Supprimer un
            médecin</button>-->

        <script>
            function openForm1() {
                document.getElementById("myForm").style.display = "block";
            }

            function closeForm1() {
                document.getElementById("myForm").style.display = "none";
            }
        </script>

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

                <label for="idchef"><b>Nom du service</b></label>
                <br>
                <!--<label for="idchef"><b>ID Du Service</b></label>
                <input type="text" placeholder="Service" name="Service" required>-->
                <select>
                    <?php while ($rowservice = mysqli_fetch_array($resservice)) :;?>
                    <option name="Service"><?php echo $rowservice[1];?></option>
                    <?php endwhile ?>
                </select>
            

                
                <!--input type="text" placeholder="Service" name="Service" required>-->


                <button type="submit" form="form" class="btn" value="Submit">Ajouter</button>
                <input type="hidden" name="f_inf" />
                <button type="button" class="btn cancel" onclick="closeForm1()">Annuler</button>
            </form>

            <?php

            if (isset($_POST['f_inf'])) {

                $prenom = $_POST['prenom'];

                $nom = $_POST['nom'];

                $identifiant = $_POST['identifiant'];

                $mdp = $_POST['mdp'];

                $Service = $_POST['Service'];

                $db = mysqli_connect("localhost:3306", "slam", "root", "hopital");

                $query1 = "SELECT max(IDPersonnel) AS lastID from personnel";


                if ($result1 = mysqli_query($db, $query1)) {
                    if (mysqli_num_rows($result1) > 0) {
                        while ($row1 = mysqli_fetch_array($result1)) {


                            $res1 = $row1["lastID"];

                            echo ' le dernier id est : ' . $res1;

                            $res1 = (int) $res1;
                            $res1 = $res1 + 1;

                            echo $prenom . $nom . $identifiant . $mdp . $Service;

                            //$query2 = "INSERT INTO personnel (IDPersonnel, IDService, Nom, Prenom, identifiant, mdp, Role) VALUES ( '$res1','$Service', '$nom', '$prenom', '$identifiant', '$mdp', 2)";
                            $query2 = 

                            mysqli_query($db, $query2);

                            header('Location: pages_admin.php');


                        }
                    }
                }
            }

            ?>


        </div>

        <br>
        <br>

        <h2>Services :</h2>

        <table class="styled-table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nom du service</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <?php

                //Serveur
                $db = mysqli_connect("localhost:3306", "slam", "root", "hopital");
                $query = "SELECT IDService, NomService FROM service";

                //Localhost
                //$db = mysqli_connect("localhost:3306","root", "bjKT8pkdmkJZLX","ap");
                //$query = "SELECT NomService, Prenom, Nom FROM service, personnel GROUP BY NomService";
                if ($result = mysqli_query($db, $query)) {
                    if (mysqli_num_rows($result) > 0) {
                        while ($row = mysqli_fetch_array($result)) {
                            echo '<tr>';
                            echo '<td>' . $row["IDService"] . '</td>';
                            echo '<td>' . $row["NomService"] . '</td>';
                            echo '<td><button style="text-decoration: none" type="button" onclick="confirmFunctionService()">Supprimer le
                            service</button></td>';
                            echo '<tr>';
                        }
                    }
                }
                ?>

                <tr class="active-row">
                </tr>
                <!-- and so on... -->
            </tbody>
        </table>



        <button class="open-button" onclick="openForm2()">Ajouter un service</button>



        <script>
            function openForm2() {
                document.getElementById("myForm2").style.display = "block";
            }

            function closeForm2() {
                document.getElementById("myForm2").style.display = "none";
            }
        </script>
        <!--<button style="text-decoration: none" type="button" onclick="confirmFunctionService()">Supprimer un
            service</button>-->

    </div>
    <div class="form-popup2" id="myForm2">
        <form action="pages_admin.php" class="form-container">
            <h1>Ajouter un service</h1>

            <label for="service"><b>Nom du service</b></label>
            <input type="text" placeholder="Nom du service" name="service" required>

            <label for="idchef"><b>ID du chef</b></label>
            <input type="text" placeholder="ID du chef" name="idchef" required>

            <button type="submit" class="btn">Ajouter</button>
            <input type="hidden" name="f_inf1" />
            <button type="button" class="btn cancel" onclick="closeForm2()">Annuler</button>
        </form>

        <?php 
         if (isset($_POST['f_inf1'])) {

            $nomService = $_POST['service'];


            $db = mysqli_connect("localhost:3306", "slam", "root", "hopital");

            $query1 = "SELECT max(IDService) AS lastIDService from service";

            if ($result1 = mysqli_query($db, $query1)) {
                if (mysqli_num_rows($result1) > 0) {
                    while ($row1 = mysqli_fetch_array($result1)) {

                        $res1 = $row1["lastIDService"];

                        echo ' le dernier id est : ' . $res1;

                        $res1 = (int) $res1;
                        $res1 = $res1 + 1;

                        $query2 = "INSERT INTO service (IDService, NomService) VALUES ( '$res1','$nomService')";

                        mysqli_query($db, $query2);

                        header('Location: pages_admin.php');


                    }
                }
            }

         }

         ?>
    </div>
</body>

</html>
