<?php require ('inc_connexion.php'); ?>
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

// gestion de la saisie et enregistrement 
//recuperation des variables
    if (isset($_POST['submit_form']))
    {
        $ville_nom = $_POST['ville_nom'];
        $ville_texte = $_POST['ville_texte'];
        $ville_id = $_POST ['ville_id'];
        // verification du contenu des variables 
    if ((empty ($ville_nom)) OR empty($ville_texte))
    {
            $message = '<p class="error"> Vous devez saisir le nom d\'une ville et sa présentation.</p>';
        }
    else
        {
            //requete UPDATE
            if ($mysqli->query('UPDATE villes SET ville_nom = "'.$ville_nom.'", ville_texte = "'.$ville_texte.'" WHERE ville_id = '. $ville_id ))
            {
                $message= '<p class="message">La mise à jour de la ville '. $ville_nom .' est effectuée .</p>';
            }
            else
             {
                $message = '<p class="error"> La mise à jour de la ville '. $ville_nom .' n\'est pas effectuée .</p>';
            }
        }
    }
// partie 2 recuperation des info de la base et affichage dans le formulaire

//recuperation de la variable externe
$id = $_GET['id'];

//requete
$result =  $mysqli->query('SELECT ville_id, ville_nom, ville_texte FROM villes WHERE ville_id = ' . $id);
// var_dump($result);
//creation du nouvel array 
$row = $result->fetch_array();
//variables destinées à l'affichage``
$nom = $row['ville_nom'];
$texte = $row['ville_texte'];
?> 

    <div>
        <h1>Ajouter une ville</h1>
        <?php if(isset($message)) echo $message ?>
        <form method="post">
        <p>Nom de la ville <input type="text" name="ville_nom" value="<?php echo $nom ?>"/> </p>

        <p>Texte de présentation<br>
        <textarea name="ville_texte" cols="32" rows="8"> <?php echo $texte ?></textarea></p>
        <input type="hidden" name="ville_id" value=" <?php echo $id ?> ">
        <p><input type="submit" name="submit_form" value="valider"/> </p>
        </form>



    </div>

<?php  
// modifier la page de mise à jour 
    $result = $mysqli->query("SELECT p.id, pays_nom FROM pays as p INNER JOIN villes as v WHERE v.pays_id = p.id ORDER BY pays_nom"); 
while ($row = $result->fetch_array())
{
    // creation du nouvel array pour afficher ulterieur
    $pays_liste [$row['id']] = $row['pays_nom'];
}

//verifier si le pays est déjà associé à une ville 
$resultat = $mysqli->query("SELECT ville_id, ville_nom, ville_texte, pays_id FROM villes WHERE ville_id = " . $id); 
$row = $resultat->fetch_array();
// variable destiné  l'affichage
$nom = $row['ville_nom'];
$texte = $row['ville_texte'];
$ville_pays_id = $row['pays_id'];
?>
  
<?php foreach($pays_liste as $id => $pays): ?>
    <!-- <li> <a href="pays.php?id=<?php //echo $id ?>"> <?php // echo $pays ?> </a> </li> -->
<?php endforeach ?>


<ul>
<?php
//afficher les resultats
foreach ($pays_liste as $pays_id => $pays_nom): ?>
<?php if ($ville_pays_id == $pays_id ): ?>
    <li class="bg_gris"> <input checked="checked" type="radio" name="pays_id" value="<?php echo $pays_id ?> "/> <?php echo $pays_nom ?> </li>
<?php else : ?>
    <li> <input type="radio" name="pays_id" value=" <?php echo $pays_id ?> "/> <?php echo $pays_nom ?> </li>
<?php endif ?>
<?php endforeach ?>
</ul>

</body>
</html>