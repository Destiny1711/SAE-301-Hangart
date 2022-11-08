<?php 
    include("parametre/parametre.php") ;
    //connexion a la base de donnee
    $bdd = new PDO('mysql:host='.$hote.';port='.$port.';dbname='.$nombase,$utilisateur,$mdp);
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="icon" type="images/x-icon" href="img/favicon.ico" />
  <link rel="stylesheet" type="text/css" href="css_bootstrap/bootstrap.min.css" />
  <link rel="stylesheet" type="text/css" href="design.css"/>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/Swiper/8.4.2/swiper-bundle.css">
  <link href="http://fonts.cdnfonts.com/css/montserrat" rel="stylesheet">
  <title>HANGART</title>
</head>
<body class="body_compte">
    <div class="div_global_form">
        <div class="log_form">
            <h2>ACCOUNT INFORMATION</h2>
            <div class="line"></div>     
            <?php 
                $requete='SELECT * FROM profil WHERE id_profil="'.$_GET['id'].'"';
                $resultats=$bdd->query($requete);
                $tabCompte = $resultats->fetchAll();
                $resultats->closeCursor();
<<<<<<< HEAD
                echo '<p class="last_name"><b>Last Name : </b>'.$tabCompte[0]['nom_profil'].'</p>';
=======
                echo '<p><b>Last Name : </b>'.$tabCompte[0]['nom_profil'].'</p>';
>>>>>>> d6bda332c3a7b1764e08d6685f1477ad9f774784
                echo '<p><b>First Name : </b>'.$tabCompte[0]['prenom_profil'].'</p>';
                echo '<p><b>E-mail : </b>'.$tabCompte[0]['email_profil'].'</p>';
                echo '<p><b>Password : </b>'.$tabCompte[0]['mdp_profil'].'</p>';
                echo '<p><b>Postal Adress : </b>'.$tabCompte[0]['adresse_profil'].'</p>';
                echo '<p><b>Mobile : </b>'.$tabCompte[0]['tel_profil'].'</p>';
<<<<<<< HEAD
                echo '<div class="div_btn_compte"><a href="form_compte.php?id='.$_GET['id'].'"><button class="btn">EDIT</button></a><div>'
	     ?>     
=======
                echo '<div class="div_btn_compte"><a href="form_compte.php?id='.$_GET['id'].'"><button class="modif_btn">EDIT</button></a><div>'
            ?>     
>>>>>>> d6bda332c3a7b1764e08d6685f1477ad9f774784
        </div>
    </div>
</body>
</html>