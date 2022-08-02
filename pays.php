<?php require ('inc_connexion.php'); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>


<?php require ('inc_menu.php') ?>

<?php

$pays_id = $_GET['id'];


//requete
$result = $mysqli->query('SELECT pays_nom, ville_nom FROM pays INNER JOIN villes WHERE villes.pays_id = pays.pays_id AND pays.pays_id = ' . $pays_id );
?>
<div class="zone-texte">
    <ul>
        <?php

    while ($row = $result->fetch_array())
    {

            $pays_nom = $row['pays_nom'];
            $ville_nom = $row['ville_nom'];
            
            
            echo "<li>" . $ville_nom . "</li>";
    }


    ?>
    </ul>
</div>

</body>
</html>

