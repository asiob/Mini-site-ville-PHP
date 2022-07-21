<?php
//fichier inclus : inc_menu.php contien le menu de nav des villes
require ('inc_connexion.php');
//requete
$result = $mysqli->query ('SELECT ville_id, ville_nom FROM villes ');
// fetch_array  qui accede aux données stoquées
while ($row = $result ->fetch_array())
{
    // creation du nouvel array pour afficher ulterieur
    $villes [$row['ville_id']] = $row['ville_nom'];
}
//affichage
$id = $_GET['id'];
?>
<div class="zone-texte">


<h1>Accueil</h1>
<p>L'administration du site vous permet d'jaouter une nouvelle ville au site ou de modifier ou supprimer une ville existante</p>
<p>Liste des villes</p>

</div>


<ul>
    <li> <a href="index.php">Acceuil</a> </li>

    <?php foreach ($villes as $id => $ville) : ?>
    <li> 
        <a href="ville.php?id=<?php echo $id ?>"> <?php echo $ville ?> </a> - 
        <a href="edition.php?id=<?php echo $id ?>"> <?php echo "editer" ?> </a> - 
        <a href="suppression.php?id=<?php echo $id ?>"> <?php echo "supprimer" ?> </a> 
        <br>
        

    </li> 
   
    <?php endforeach ?>
</ul>
<ul>
    <li><a href="admin.php?id=<?php echo $id ?>"> <?php echo "Administration" ?> </a> </li>
</ul>