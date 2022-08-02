<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
    
<?php
//fichier inclus : inc_menu.php contien le menu de nav des villes

//requete
$result = $mysqli->query ('SELECT ville_id, ville_nom FROM villes ');
// fetch_array  qui accede aux données stoquées
while ($row = $result ->fetch_array())
{
    // creation du nouvel array pour afficher ulterieur
    $villes [$row['ville_id']] = $row['ville_nom'];
}

$result_pays = $mysqli->query ('SELECT pays_id, pays_nom FROM pays ');
// fetch_array  qui accede aux données stoquées
while ($row = $result_pays ->fetch_array())
{
    // creation du nouvel array pour afficher ulterieur
    $pays[$row['pays_id']] = $row['pays_nom'];
}
?>
<ul>
    <li> <a href="index.php">Acceuil</a> </li>

    <?php foreach ($villes as $id => $ville) : ?>
    <li> 
        <a href="ville.php?id=<?php echo $id ?>"> <?php echo $ville ?> </a> 
    </li> 
    
    <?php endforeach ?>
    <br>
    <li><a href="admin.php">Administration</a> </li>
    
    <h4>Pays</h4>

    <?php foreach ($pays as $id => $p) : ?>
    <li> 
        
        <a href="pays.php?id=<?php echo $id ?>"> <?php echo $p ?> </a> 
    </li>
    <?php endforeach ?>
</ul>
</body>
</html>