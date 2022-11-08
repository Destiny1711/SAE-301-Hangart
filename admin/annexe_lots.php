<?php
    //rentrée des données des intervenants dans la bdd
    //verification si il y a une correspondance dans la base de donnee
    include("../parametre/parametre.php");
    $bdd = new PDO('mysql:host='.$hote.';port='.$port.';dbname='.$nombase,$utilisateur,$mdp);
    $requete='SELECT * FROM intervenants';
    $resultats = $bdd->query($requete);
    $tabinter=$resultats->fetchAll();
    $resultats->closeCursor();
    //recuperation donnée intervenants
    if (isset($_POST['soumettre4'])) {
        $sql='INSERT INTO lots(nom_lots,description_lots,id_concours) VALUES("'.$_POST["nom_lots"].'","'.$_POST["description_lots"].'","'.$_POST["id_concours"].'")';
        $sql=$bdd->query($sql);
        $sql->closeCursor();
    }
    $requete='SELECT * FROM lots';
    $resultats = $bdd->query($requete);
    $tablots=$resultats->fetchAll();
    $resultats->closeCursor();
    if(isset($_GET['i'])){
        $i=$_GET['i'];          
        $sql='DELETE FROM lots WHERE id_lots='.$i;
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
  <link rel="stylesheet" type="text/css" href="../design.css"/>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/Swiper/8.4.2/swiper-bundle.css">
  <link href="http://fonts.cdnfonts.com/css/montserrat" rel="stylesheet">
  <title>HANGART - ANNEXE</title>
</head>
<body class="body_compte">
    <div class="div_global_form">
        <div class="log_form" method="POST" enctype="multipart/form-data">  
            <h2>VEUILLEZ CONFIRMER</h2>
            <div class="line"></div>
            <div style="width:100%; margin-bottom:2vw; text-align:center;">En cliquant sur "confirmer", vous allez modifier la base de donnée.</div>
            <?php
                echo'
                    <form action="formulaire_lot.php?id='.$_GET['id'].'" method="POST">
                        <input class="btn1" type="submit" value="Envoyer">
                    </form>
                ';
            ?>
        </div>
    </div>
</body>
</html>