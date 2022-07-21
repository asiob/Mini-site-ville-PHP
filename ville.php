
<?php require ('inc_connexion.php'); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php
//1recuperation de la variable externe
$id = $_GET['id'];

//requete
$result = $mysqli->query ('SELECT ville_id, ville_nom, ville_texte FROM villes WHERE ville_id = ' .$id);

//4  creation du nouvel array
$row = $result->fetch_array();
//5 variable destiné à l'affichage
$nom = $row['ville_nom'];
$texte = $row['ville_texte'];
?>
<title> <?php echo $nom ?> </title>
<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
    <div class="zone-texte">
        <h1> <?php echo $nom  ?></h1>
        <p> <?php echo $texte ?> </p>
    </div>
    
    <?php require ('inc_menu.php') ?>
    <?php require ('inc_footer.php') ?>
</body>
</html>