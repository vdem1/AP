<?php
function connexion_bdd()
{
/*************************CONNEXION A LA BDD*************************************** */
$host = 'localhost:3306';
$db   = 'hopital';
$user = 'root';
$pass = '';
$dsn = "mysql:host=$host;dbname=$db";
$options = [
    PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
];

try {
    $pdo = new PDO($dsn, $user, $pass, $options);
} 
catch (\PDOException $e) {
    print"ERREUR:".$e;
    throw new \PDOException($e->getMessage(), (int)$e->getCode());
}
return $pdo;
}//fin fonction connexion_bdd

function doc(){
    $pdo=connexion_bdd();
    $stmt=$pdo->prepare("SELECT IDPersonnel, Nom, Prenom FROM Personnel");
    $stmt->execute();
    while ($row=$stmt->fetch()){
        echo "<option value='".$row["IDPersonnel"]."'>".$row["Prenom"]." ".$row["Nom"]."</option>";
    }
}

function ajout($mat,$nom,$prenom,$cadre,$service){
    $pdo=connexion_bdd();
    $stmt=$pdo->prepare("INSERT INTO employe VALUES ('".$mat."','".$nom."','".$prenom."','".$cadre."','".$service."')");
    $stmt->execute();
}

function valpread($idpatient,$iddoc,$date,$heure,$pread,$chambre){
    $pdo=connexion_bdd();
    $stmt=$pdo->prepare("INSERT INTO hospitalisation VALUES ('".$idpatient."','".$iddoc."','".$date."','".$heure."','".$pread."','".$chambre."')");
    $stmt->execute();
}

function account($nom, $mdp){
    $pdo=connexion_bdd();
    $stmt=$pdo->prepare("SELECT role FROM personnel WHERE identifiant='".$nom."' AND mdp='".$mdp."';");
    $stmt->execute();
   while ($row=$stmt->fetch()){
        return $row['role'];
   }
}

//function valpatient()
