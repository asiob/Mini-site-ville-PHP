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
//affichage
?>
<ul>
    <li> <a href="index.php">Acceuil</a> </li>

    <?php foreach ($villes as $id => $ville) : ?>
    <li> 
        <a href="ville.php?id=<?php echo $id ?>"> <?php echo $ville ?> </a> 
    </li> 
    
    <?php endforeach ?>

</ul>