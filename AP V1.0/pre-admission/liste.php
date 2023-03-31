<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="liste.css">
    <title>Document</title>
</head>
<body>
    <nav>
        <h1>Liste des pré-admissions</h1>
    </nav>

    <form class=recherche method="post">
        <input type="date" name="date" id="date">
        <button type="submit">Rechercher</button>
    </form>

    <div class="liste">
        <div class="ligne colorer">
            <div class="colone">
                Prenom
            </div>
            <div class="colone">
                nom de naissance
            </div>
            <div class="colone">
                nom d'épouse
            </div>
            <div class="colone">
                numéro de sécurité sociale
            </div>
            <div class="colone">
                date d'hospitalisation
            </div>
            <div class="colone">
                docteur
            </div>
            <div class="colone">
                service
            </div>
            <div class="colone">
            </div>
        </div>
        <?php
        session_start();

        if(isset($_POST['date'])){
            $liste="<div><div style='width:100%; display: flex;'><div style='width: 100%; text-align: center; padding: 1%;'>Prenom</div>
            <div class='colone' style='width: 100%; text-align: center; padding: 1%;'>nom de naissance</div>
            <div class='colone' style='width: 100%; text-align: center; padding: 1%;'>nom d'épouse</div>
            <div class='colone' style='width: 100%; text-align: center; padding: 1%;'>numéro de sécurité sociale</div>
            <div class='colone' style='width: 100%; text-align: center; padding: 1%;'>date d'hospitalisation</div>
            <div class='colone' style='width: 100%; text-align: center; padding: 1%;'>docteur</div>
            <div class='colone' style='width: 100%; text-align: center; padding: 1%;'>service</div></div>";
            $date = new DateTime($_POST['date']);
            $week = $date->format("W");
            $year = $date->format("Y");
            $first_day = new DateTime();
            $first_day->setISODate($year, $week, 1);
            $last_day = new DateTime();
            $last_day->setISODate($year, $week, 7);
            $first_day_str = $first_day->format("Y-m-d");
            $last_day_str = $last_day->format("Y-m-d");
            $_SESSION['name']="liste pré-admissions du ".$first_day_str." au ".$last_day_str.".pdf";
            error_reporting(E_ALL);
            require('../connexion_bdd.php');
            ini_set("display_errors",1);
            $stmt=semaine($first_day_str, $last_day_str);
            $i=0;
            while ($row=$stmt->fetch()){
                if ($i==1){
                    echo '<div class="ligne colorer">';
                }
                else{
                    echo '<div class="ligne">';
                }
                echo '<div class=colone>'. $row['Prenom'].'</div><div class=colone>'. $row['NomNaiss'].'</div><div class=colone>'. $row['NomEpouse'].'</div>
                <div class=colone>'. $row['NumSecu'].'</div><div class=colone>'. $row['Date'].'</div><div class=colone>'. $row['Ndoc'].'</div>
                <div class=colone>'. $row['NomService'].'</div><div class=colone><a href=modPreAd.php>modifier</a></div></div>';

                if ($i==1){
                    $liste=$liste.'<div class="ligne colorer style="width:100%; display: flex; background-color: rgba(98, 224, 255, 0.603);">';
                    $i=0;
                }
                else{
                    $liste=$liste.'<div class="ligne" style="width:100%; display: flex;">';
                    $i=1;
                }
                $liste=$liste.'<div class="colone" style="width: 100%; text-align: center; padding: 1%;">'. $row['Prenom'].'</div>
                <div class="colone" style="width: 100%; text-align: center; padding: 1%;">'. $row['NomNaiss'].'</div>
                <div class="colone" style="width: 100%; text-align: center; padding: 1%;">'. $row['NomEpouse'].'</div>
                <div class="colone" style="width: 100%; text-align: center; padding: 1%;">'. $row['NumSecu'].'</div>
                <div class="colone" style="width: 100%; text-align: center; padding: 1%;">'. $row['Date'].'</div>
                <div class="colone" style="width: 100%; text-align: center; padding: 1%;">'. $row['Ndoc'].'</div>
                <div class="colone" style="width: 100%; text-align: center; padding: 1%;">'. $row['NomService'].'</div></div></div>';
                $_SESSION['liste']=$liste;
            }
           echo '<form action="testTCPDF.php" method=post>
                    <input type="submit" value="générer un pdf" name="test" class="test">
                </form>';
        }

    ?>
    </div>
    
    <a href=menu.php>quitter</a>
</body>
</html>