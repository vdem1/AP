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
    $stmt=$pdo->prepare("SELECT IDPersonnel, Nom, Prenom FROM personnel WHERE Role=2");
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
    $stmt=$pdo->prepare("SELECT role, nom, prenom FROM personnel WHERE identifiant='".$nom."' AND mdp='".$mdp."';");
    $stmt->execute();
    return ($stmt);
}

function patient($civilite, $nomNaiss, $nomEpous, $prenom, $dateNaiss, $majeur, $adresse, $CP, $ville, $email, $tel){
    $pdo=connexion_bdd();
    $stmt=$pdo->prepare("INSERT INTO patient (Civilite, NomNaiss, NomEpouse, Prenom, DateNaiss, Mineur,  Adresse, CP, Ville, Email, Tel)
    values ('".$civilite."', '".$nomNaiss."', '".$nomEpous."', '".$prenom."', '".$dateNaiss."', ".$majeur.", '".$adresse."', ".$CP.", '".$ville."', '".$email."', ".$tel.");");
    $stmt->execute();
}

function id(){
    $pdo=connexion_bdd();
    $stmt=$pdo->prepare("SELECT MAX(IDPatient) as 'ID' FROM patient");
    $stmt->execute();
    if ($row=$stmt->fetch()){
        return ($row ['ID']);
    }
}

function admission($ID, $Doc, $date, $heure, $preAd){
    $pdo=connexion_bdd();
    $stmt=$pdo->prepare("INSERT INTO hospitalisation (IDPatient, IDDoc, date, heure, preAdmission) values (".$ID.", ".$Doc.", '".$date."', '".$heure."', '".$preAd."')");
    $stmt->execute();
}

function couverture($numSecu, $CaisseAssu, $assure, $ALDChoix, $nomMut, $chambrePart, $numAdherant, $ID){
    $pdo=connexion_bdd();
    $stmt=$pdo->prepare("INSERT INTO  couverture_sociale values (".$numSecu.", '".$CaisseAssu."', ".$assure.", ".$ALDChoix.", '".$nomMut."', ".$chambrePart.", ".$numAdherant.")");
    $stmt->execute();
    $stmt=$pdo->prepare("UPDATE patient SET NumSecu = ".$numSecu." WHERE IDPatient = ".$ID);
    $stmt->execute();
}

function contact1($nom, $prenom, $tel, $adresse, $ID){
    $pdo=connexion_bdd();
    $stmt=$pdo->prepare("INSERT INTO contact (Nom, Prenom, tel, Adresse) values ('".$nom."', '".$prenom."', ".$tel.", '".$adresse."')");
    $stmt->execute();
    $stmt=$pdo->prepare("UPDATE patient SET IDPrevenir=(SELECT LAST_INSERT_ID() as id from contact group by id), 
    IDConfiance=(SELECT LAST_INSERT_ID() as id from contact group by id) WHERE IDPatient = ".$ID);
    $stmt->execute();
}

function contact2 ($nom, $prenom, $tel, $adresse, $ID){
    $pdo=connexion_bdd();
    $stmt=$pdo->prepare("INSERT INTO contact (Nom, Prenom, tel, Adresse) values ('".$nom."', '".$prenom."', ".$tel.", '".$adresse."')");
    $stmt->execute();
    $stmt=$pdo->prepare("UPDATE patient SET IDConfiance=(SELECT LAST_INSERT_ID() as id from contact group by id) WHERE IDPatient = ".$ID);
    $stmt->execute();
}

function Documents(){
    $pdo=connexion_bdd();
    $stmt=$pdo->prepare("INSERT INTO document (CarteID,CarteVitale, Mutuelle, LivretFamille) VALUES ('".$folder."','".$folder2."','".$folder3."','".$folder4."')");
    $stmt->execute();
}

function semaine($date1, $date2){
    $pdo=connexion_bdd();
    $stmt=$pdo->prepare("SELECT patient.Prenom, patient.NomNaiss, patient.NomEpouse, patient.NumSecu, hospitalisation.`Date`, personnel.Nom as Ndoc, 
    service.NomService from patient 
    inner join hospitalisation
    on patient.IDPatient = hospitalisation.IDPatient 
    inner join personnel
    on hospitalisation.IDDoc = personnel.IDPersonnel 
    inner join service
    on personnel.IDService = service.IDService
    where date BETWEEN '".$date1."' AND '".$date2."'");
    $stmt->execute();
    return($stmt);
}