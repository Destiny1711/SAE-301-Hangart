<?php 
    include("../parametre/parametre.php");
    //connexion a la base de donnee
    $bdd = new PDO('mysql:host='.$hote.';port='.$port.';dbname='.$nombase,$utilisateur,$mdp);
?>

<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="icon" type="images/x-icon" href="img/favicon.ico" />
  <link rel="stylesheet" type="text/css" href="../css_bootstrap/bootstrap.min.css" />
  <link rel="stylesheet" type="text/css" href="../css/design.css"/>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/Swiper/8.4.2/swiper-bundle.css">
  <link href="http://fonts.cdnfonts.com/css/montserrat" rel="stylesheet">
  <title>HANGART - ADMIN</title>
</head>
<body class="body_compte">
    <div class="div_global_form">
        <form class="log_form" method="POST" enctype="multipart/form-data">  
            <h2>MODIFIER LE CONCOURS</h2>
            <div class="line"></div>
            <div style="width:100%; margin-bottom:2vw; text-align:center;">Attention : Toutes les informations saisit sont toutes de nouvelles valeurs</div>
            <div class="mb-3 div_form_signin">
                <label for="" class="form-label">Nom</label>
                <input type="name" class="form-control" name="nom_concours" aria-describedby="emailHelp">
            </div>
            <div class="mb-3 div_form_signin">
                <label for="" class="form-label">Horaires</label>
                <input type="time" name="horaires_concours" class="form-control">
            </div>
            <div class="mb-3 div_form_signin max">
                <label for="" class="form-label">Date</label>
                <input type="date" name="date_concours" class="form-control" aria-describedby="emailHelp">              
            </div>
            <input class="btn2" type="submit" name="btn" value="Envoyer">
            <?php
                echo'
                    <form action="formulaire_concours.php?id='.$_GET['id'].'" method="POST">
                        <input class="btn2" type="submit" value="Retourner sur la page précédente">
                    </form>
                ';
            ?>
            <?php 
                if (isset($_POST['btn'])){
                /** Execute une requete sql verifiant si le mail saisit existe dans la table*/
                $requete='UPDATE concours SET 
                nom_concours="'.$_POST['nom_concours'].'", 
                horaires_concours="'.$_POST['horaires_concours'].'",
                date_concours="'.$_POST['date_concours'].'"
                WHERE id_concours="'.$_GET['id_concours'].'"';
                $resultats=$bdd->query($requete);
                }
            ?>
        </form>
    </div>
</body>
</html>