
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
    $result = $mysqli->query ('SELECT ville_id, ville_nom, ville_texte, pays_id FROM villes WHERE ville_id = ' .$id);

    //4  creation du nouvel array
    $row = $result->fetch_array();
    //5 variable destiné à l'affichage
    $nom = $row['ville_nom'];
    $texte = $row['ville_texte'];
    $ville_pays_id = $row['pays_id'];
    // var_dump($ville_pays_id);
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
    
    <?php
    // echo $ville_pays_id;
    $sql = "SELECT pays_id, pays_nom FROM pays WHERE pays_id =";
    
    //retourne le pays
    $result = $mysqli->query($sql . $ville_pays_id) ;
    $row = $result->fetch_array();
    $pays_nom = $row['pays_nom'];
     
    echo $pays_nom;

//afficher la liste de toutes les villes et de leurs pays
// $sql = "SELECT pays_nom, ville_nom FROM pays INNER JOIN villes WHERE villes.pays_id = pays.pays_id";





$sql = "SELECT pays_nom FROM pays INNER JOIN villes WHERE villes.pays_id = pays.pays_id GROUP BY pays_nom ORDER BY pays_nom";




    ?>

<?php require ('inc_footer.php') ?>

</body>
</html>