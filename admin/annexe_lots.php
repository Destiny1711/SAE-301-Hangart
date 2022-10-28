<?php
//rentrée des données des intervenants dans la bdd
//verification si il y a une correspondance dans la base de donnee
include("../parametre/parametre.php") ;

$bdd = new PDO('mysql:host='.$hote.';port='.$port.';dbname='.$nombase,$utilisateur,$mdp);
$requete='SELECT * FROM intervenants';
$resultats = $bdd->query($requete) ;
$tabinter=$resultats->fetchAll() ;
$resultats->closeCursor() ;
//recuperation donnée intervenants
if (isset($_POST['soumettre4'])) {
    $sql='INSERT INTO lots(nom_lots,description_lots,id_concours) VALUES("'.$_POST["nom_lots"].'","'.$_POST["description_lots"].'","'.$_POST["id_concours"].'")';
    $sql=$bdd->query($sql);
    $sql->closeCursor();
    $message='Informations envoyées';
    echo '<script type="text/javascript">window.alert("'.$message.'");</script>';
}

$requete='SELECT * FROM lots';
            $resultats = $bdd->query($requete) ;
            $tablots=$resultats->fetchAll() ;
            $resultats->closeCursor() ;

if(isset($_GET['i'])){
    $i=$_GET['i'];          
    $sql='DELETE FROM intervenants WHERE id_lots='.$i;
    $sth = $bdd->prepare($sql);
    $sth->execute();
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="../css_bootstrap/bootstrap.min.css" />
    <link href="../design.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href="http://fonts.cdnfonts.com/css/montserrat" rel="stylesheet">
    <title>Document</title>
</head>
<body>
    <?php
    echo'
    <form action="formulaire_lot.php?id='.$_GET['id'].'" method="POST">
        <input type="submit">
    </form>';
    ?>
</body>
</html>