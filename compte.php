<?php 
include("parametre/parametre.php") ;

//connexion a la base de donnee
$bdd = new PDO('mysql:host='.$hote.';port='.$port.';dbname='.$nombase,$utilisateur,$mdp);
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="css_bootstrap/bootstrap.min.css" />
    <link rel="stylesheet" type="text/css" href="design.css"/>
    
    <script src="https://code.jquery.com/jquery-2.1.4.min.js"></script>
    <script src="js_bootstrap/bootstrap.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/Swiper/8.4.2/swiper-bundle.css">
    <link href="http://fonts.cdnfonts.com/css/montserrat" rel="stylesheet">
    <title>Compte</title>
</head>
<body class="body_compte">
    <div class="div_global_form">
        <div class="log_form">
            <h2>INFORMATION DU COMPTE</h2>
            <div class="line"></div>
            
            <?php 
            $requete='SELECT * FROM profil WHERE id_profil="'.$_GET['id'].'"';
            $resultats=$bdd->query($requete);
            $tabCompte = $resultats->fetchAll();
            $resultats->closeCursor();
            echo '<p><b>Nom : </b>'.$tabCompte[0]['nom_profil'].'</p>';
            echo '<p><b>Prénom : </b>'.$tabCompte[0]['prenom_profil'].'</p>';
            echo '<p><b>Email : </b>'.$tabCompte[0]['email_profil'].'</p>';
            echo '<p><b>Mot de passe : </b>'.$tabCompte[0]['mdp_profil'].'</p>';
            echo '<p><b>Adresse Postale : </b>'.$tabCompte[0]['adresse_profil'].'</p>';
            echo '<p><b>Numéro de Téléphone : </b>'.$tabCompte[0]['tel_profil'].'</p>';
            echo '<div class="div_btn_compte"><a href="form_compte.php?id='.$_GET['id'].'"><button class="modif_btn">Modifier</button></a><div>'
            ?>
            
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/swiper/swiper-bundle.min.js"></script>
</body>
</html>