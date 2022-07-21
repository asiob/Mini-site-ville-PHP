<?php require ('inc_connexion.php'); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php 
//recuperation de la variable externe
$id = $_GET['id'];


// requete.
if ($mysqli->query('DELETE FROM villes WHERE ville_id = ' . $id))
{
    $message = '<p class="message"> La ville a bien été supprimée dans la base .<br> <a href="liste.php"> Acceder à la liste des villes </a> </p>';
}
else {
    $message = '<p class="error"> Erreur de la suppression.</p>';
}
?>

    <title>Supression</title>
<link rel="stylesheet" href="style.css">


</head>
<body>
    <?php echo $message ?>
</body>
</html>