<!DOCTYPE html>
<html lang="">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="pre-admission.css">
</head>
<body>
    <div class="corps">
        <div class="test">
            <center><h1>LPF</h1></center>
            <form action=verif.php method=post>
                <div class="">
                    <center><label for="name">Identifiant<label><center><br>
                    <input type=text name="name" required>
                </div>
                <div class="">
                    <center><label for="password">Mot de passe<label><center><br>
                    <input type=password name="password" required>
                </div>
                <div class="">
                    <input type=submit>
                </div>
            </form>
        </div>
    </div>
</body>
</html>