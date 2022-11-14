<?php 
    include("../parametre/parametre.php");
    //connexion a la base de donnee
    $bdd = new PDO('mysql:host='.$hote.';port='.$port.';dbname='.$nombase,$utilisateur,$mdp);
    $requete='SELECT * FROM concours';
    $resultats = $bdd->query($requete);
    $tabconcours=$resultats->fetchAll();
    $resultats->closeCursor();
    $nbconcours=count($tabconcours);
    if (isset($_POST['soumettre3'])) {
        $sql='INSERT INTO concours(nom_concours,date_concours,horaires_concours) VALUES("'.$_POST["nom_concours"].'","'.$_POST["date_concours"].'","'.$_POST["horaires_concours"].'")';
        $sql=$bdd->query($sql);
        $sql->closeCursor();
    }
    if(isset($_GET['i'])){
        $i=$_GET['i'];          
        $sql='DELETE FROM concours WHERE id_concours='.$i;
        $sth = $bdd->prepare($sql);
        $sth->execute();
    }
?>

<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="icon" type="images/x-icon" href="img/favicon.ico" />
  <link rel="stylesheet" type="text/css" href="../css_bootstrap/bootstrap.min.css" />
  <link rel="stylesheet" type="text/css" href="../css/design.css"/>
  <link href="http://fonts.cdnfonts.com/css/montserrat" rel="stylesheet">
  <title>HANGART - Admin</title>
</head>
<body class="body_compte">
    <div class="div_global_form">
        <div class="log_form" method="POST" enctype="multipart/form-data">  
            <h2>VEUILLEZ CONFIRMER</h2>
            <div class="line"></div>
            <div style="width:100%; margin-bottom:2vw; text-align:center;">En cliquant sur "confirmer", vous allez modifier la base de donnée.</div>
            <?php
                echo'
                    <form action="formulaire_concours.php?id='.$_GET['id'].'" method="POST">
                        <input class="btn1" type="submit" value="Envoyer">
                    </form>
                ';
            ?>
        </div>
    </div>
</body>
</html>