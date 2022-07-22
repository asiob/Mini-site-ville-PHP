
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

<?php
//retourne le pays
$resultat = $mysqli->query("SELECT pays_id, pays_nom FROM pays WHERE pays_id = " . $ville_pays_id); 
$row = $resultat->fetch_array();
$pays_nom = $row['pays_nom'];

$mysqli->query('SELECT pays_nom, ville_nom FROM pays INNER JOIN villes WHERE villes.pays_id = pays.pas_id');

?>


</body>
</html>