<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../style.css">
    <title>Document</title>
</head>
<body>
    <?php
        session_start();
        if (isset($_POST['upload'])) {
            if(($_FILES['uploadfile1']['size'] > 0) && ($_FILES['uploadfile2']['size'] > "0") && ($_FILES['uploadfile3']['size'] > 0) && ($_FILES['uploadfile4']['size'] > 0)) {
                $filename = $_FILES["uploadfile1"]["name"];
                $filename2 = $_FILES["uploadfile2"]["name"];
                $filename3 = $_FILES["uploadfile3"]["name"];
                $filename4 = $_FILES["uploadfile4"]["name"];
    
                $tempname = $_FILES["uploadfile1"]["tmp_name"];
                $tempname2 = $_FILES["uploadfile2"]["tmp_name"];
                $tempname3 = $_FILES["uploadfile3"]["tmp_name"];
                $tempname4 = $_FILES["uploadfile4"]["tmp_name"];
    
                $folder = "./image/" . $filename;
                $folder2 = "./image/" . $filename2;
                $folder3 = "./image/" . $filename3;
                $folder4 = "./image/" . $filename4;
    
                Documents($folder, $folder2, $folder3, $folder4);
        
                // On bouge toutes les images dans le dossier image
                if((move_uploaded_file($tempname, $folder)) && (move_uploaded_file($tempname2, $folder2)) && (move_uploaded_file($tempname3, $folder3)) && (move_uploaded_file($tempname4, $folder4))) {
                    echo "<h3>  successful!</h3>";
                } else {
                    echo "<h3>  Failed to upload!</h3>";
                }
            } else {
                echo "<h3> Vide</h3>";
            }
        }
        
    ?>
    <a href="menu.php">menu</a>
</body>
</html>