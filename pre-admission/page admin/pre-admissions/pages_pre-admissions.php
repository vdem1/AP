<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script type = "text/javascript" src="adminJS.js"></script>
    <link rel="stylesheet" href="style_pre-admissions.css">  
    <title>Document</title>


</head>
<body>

<div class="sidenav">

  <a href="../admin/pages_admin.php">Panel admin</a>
  <a href="../services/pages_services.php">Services</a>
  <a href="../medecins/pages_medecins.php">Médecins</a>
  <a class="active" href="">Pré-admissions</a>
  <a href="../statistiques/pages_statistiques.php">Statistiques</a>
  <a class="deconnexion" href="">Déconnexion</a>
</div>

<div class="main">

<h1>Bienvenue sur le panel pré-admissions de la LPF Clinique ! </h1>

<p>Connecté en tant que:</p>

<br>
<br>

<label for="medecin-select">Choisir un médecin:</label>

<select name="medecin" id="medecin-select">
    <option value="">--Choissisez un médecin-- </option>
    <option value="med1">Jean Medecin</option>
    <option value="med2">Bernard Medecin</option>
</select>

<button type="button">Ajouter un médecin</button>
<button type="button" onclick="confirmFunctionMedecin()">Supprimer un médecin</button>

<br>
<br>

<label for="service-select">Choisir un service:</label>

<select name="service" id="service-select">
    <option value="">--Choissisez un service-- </option>
    <option value="service1">Chirurgie Viscérale</option>
    <option value="service2">Chirurgie Vasculaire</option>
</select>

<button type="button">Ajouter un service</button>
<button type="button" onclick="confirmFunctionService()">Supprimer un service</button>

</div>

</body>
</html>