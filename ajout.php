<?php

 require ('inc_connexion.php'); 
 ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
   <?php 
   // recuperation de la variable
    if (isset ($_POST['submit_form']))
    {
        $ville_nom = $_POST['ville_nom'];
        $ville_texte = $_POST['ville_texte'];

        if ((empty ($ville_nom)) OR empty($ville_texte))
        {
            $message= ' <p classe="error">Vous devez saisir le nom d\'une ville et sa présentation. </p> ';
        }
        else 

        {
            //la ville existe-t-elle dans la base ?
                //effectuons une requete select avec count
            $result = $mysqli->query('SELECT count(ville_id) FROM villes WHERE ville_nom= "' . $ville_nom .'"');
            $row = $result->fetch_array();
            //$row contient la veleur retournée par le count () de mysql 
            if ($row[0]> 0)
            {
                $message = ' <p class ="error"> La ville est déjà enregistrée . </p>';
            }

            else {
                // requete insert into
                if ($mysqli->query('INSERT INTO villes (ville_nom, ville_texte) 
                    VALUES ("'.$ville_nom.'", "'.$ville_texte.'")'))
                    {
                        // si requete effectuée elle retourne le booleen true et false donc le message pourra etre affiche
                        $message = ' <p class="message"> L\'ajout de la ville'. $ville_nom .' est effectué. </p> ';
        
                    }
                    else {
                    $message = '<p class="error"> L\'ajout de la ville '. $ville_nom .' n\'est pas effectué. </p> ';
                    }
            }
        }
    }
?>


<div>
    <h1>Ajouter une ville</h1>
    <?php if (isset($message)) echo $message ?>
    <form method="post">
        <div>
            <label for="name">Nom de la ville:</label>
            <input type="text" name="ville_nom" />
        </div>
        <div>
            <label for="name">Description :</label>
            <textarea name="ville_texte"> </textarea>
        </div>
        <div class="button">
            <input type="submit" name="submit_form"  value="valider"> 
            
        </div>
    </form>
</div>
    

</body>
</html>