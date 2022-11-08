<?php
    include("../parametre/parametre.php");
    //connexion a la base de donnee
    $bdd = new PDO('mysql:host='.$hote.';port='.$port.';dbname='.$nombase,$utilisateur,$mdp);
    $requete='SELECT * FROM concours';
    $resultats = $bdd->query($requete);
    $tabconcours=$resultats->fetchAll();
    $resultats->closeCursor();
    $nbconcours=count($tabconcours);
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
            <h2>MODIFIER LE LOT</h2>
            <div class="line"></div>
            <div style="width:100%; margin-bottom:2vw; text-align:center;">Attention : Toutes les informations saisit sont toutes de nouvelles valeurs</div>
            <div class="mb-3 div_form_signin max">
                <label for="" class="form-label">Nom</label>
                <input type="name" class="form-control" name="nom_lots" aria-describedby="emailHelp">
            </div>
            <div class="mb-3 div_form_signin max">
                <label for="" class="form-label">Description</label>
                <textarea name="description_lots" class="form-control" required></textarea>
            </div>
            <div class="mb-3 div_form_signin max">
                <select class="list" name="id_concours">
                    <option value="">--Choisir un concours--</option>
                    <?php
                        for($i=0; $i<$nbconcours; $i++){
                            echo '<option value="'.$tabconcours[$i]["id_concours"].'">'.$tabconcours[$i]["nom_concours"].'</option>';
                        }
                    ?>
                </select>
            </div>      
            <input class="btn2" type="submit" name="btn" value="Envoyer">
            <?php
                echo'
                    <form action="formulaire_lot.php?id='.$_GET['id'].'" method="POST">
                        <input class="btn2" type="submit" value="Retourner sur la page précédente">
                    </form>
                ';
            ?>
            <?php 
                if (isset($_POST['btn'])){
                /** Execute une requete sql verifiant si le mail saisit existe dans la table*/
                $requete='UPDATE lots SET 
                nom_lots="'.$_POST['nom_lots'].'", 
                description_lots="'.$_POST['description_lots'].'",
                id_concours="'.$_POST['id_concours'].'"
                WHERE id_lots="'.$_GET['id_lots'].'"';
                $resultats=$bdd->query($requete);
                $talots = $resultats->fetchAll();
                $resultats->closeCursor();
            }
            ?>
        </form>
    </div>
</body>
</html>