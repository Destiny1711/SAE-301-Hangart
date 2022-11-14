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
  <link rel="stylesheet" type="text/css" href="css/design.css"/>
  <link href="http://fonts.cdnfonts.com/css/montserrat" rel="stylesheet">
  <title>HANGART - ADMIN</title>
</head>
<body>
  <header>
    <div class="container-fluid" id="accueil">
      <div class="row">
        <div class="topbar">
          <div class="darkmode">
            <img src="img/light.png" alt="light mode" class="img_light">
            <div class="form-check form-switch div_checkbox"><input class="form-check-input" type="checkbox" role="switch" id="darkMode" name="darkMode"></div>
            <img src="img/dark.png" alt="dark mode" class="img_dark">
          </div>
          <div class="top_vip"></div>
          <div class="translation-icons" style="visibility:hidden">
            <a href="#" class="fr" data-placement="0"><img src="img/france.png" class="flag" alt="french flag"></a>
            <a href="#" class="en" data-placement="1"><img src="img/uk.png" class="flag" alt="united kingdom flag"></a>
            <a href="#" class="es" data-placement="2"><img src="img/espagne.png" class="flag" alt="spanish flag"></a>
            <a href="#" class="it" data-placement="3"><img src="img/italy.png" class="flag" alt="italian flag"></a>
          </div>
          <div id="google_translate_element" style="display:none;"></div>
        </div>
      </div>
      <div class="row">
        <div class="col-md navigation">
          <div class="divLogo">
            <?php
              if(isset($_GET['id'])){
                echo'
                <a href="index.php?id='.$_GET['id'].'"><img class="logo" id="logo" src="img/logo_hangart.png" alt="Logo Hangart"></a>';
              } 
              else { 
                echo'
                <a href="index.php"><img class="logo" id="logo" src="img/logo_hangart.png" alt="Logo Hangart"></a>';
              }
            ?>
          </div>
          <ul class="menu">
            <li><a href="index.php">Accueil</a></li>
            <li><a href="index.php">Programme</a></li>
            <li><a href="index.php">Lieu & Horaires</a></li>
            <li><a href="index.php">Concours</a></li>
            <li><a href="index.php">Contact</a></li>
          </ul>
          <div class="profil"></div>
        </div>
      </div>
    </div>
  </header>
    <div class="div_global_form">
        <form class="log_form" method="POST" enctype="multipart/form-data">  
            <h2>ACCOUNT INFORMATION</h2>
            <div class="line"></div>
            <div style="width:100%; margin-bottom:2vw; text-align:center;">Warning : All information entered are all new values</div>
            <div class="mb-3 div_form_signin">
                <label for="" class="form-label">Last Name</label>
                <input type="name" class="form-control" name="nom_profil" aria-describedby="emailHelp" required>
            </div>
            <div class="mb-3 div_form_signin">
                <label for="" class="form-label">First Name</label>
                <input type="name" name="prenom_profil" class="form-control" required>
            </div>
            <div class="mb-3 div_form_signin">
                <label for="" class="form-label">E-mail</label>
                <input type="email" name="email_profil" class="form-control" aria-describedby="emailHelp" required>  
            </div>
            <div class="mb-3 div_form_signin">
                <label for="" class="form-label">Password</label>
                <input type="password" name="mdp_profil" class="form-control" required>
            </div>
            <div class="mb-3 div_form_signin">
                <label for="" class="form-label">Postal Adress</label>
                <input type="text" name="adresse_profil" class="form-control" required>
            </div>
            <div class="mb-3 div_form_signin">
                <label for="" class="form-label">Mobile</label>
                <input type="number" name="tel_profil" class="form-control" required>
            </div>
            <input class="btn" type="submit" name="btn" value="Send">
            <?php 
                if (isset($_POST['btn'])){
                /** Execute une requete sql verifiant si le mail saisit existe dans la table*/
                    $requete='UPDATE profil SET 
                    nom_profil="'.$_POST['nom_profil'].'", 
                    prenom_profil="'.$_POST['prenom_profil'].'",
                    email_profil="'.$_POST['email_profil'].'",
                    mdp_profil="'.md5($_POST['mdp_profil']).'",
                    adresse_profil="'.$_POST['adresse_profil'].'",
                    tel_profil="'.$_POST['tel_profil'].'"
                    WHERE id_profil="'.$_GET['id'].'"';
                    $resultats=$bdd->query($requete);
                    $tabCompte = $resultats->fetchAll();
                    $resultats->closeCursor();
                }
            ?>
        </form>
    </div>
    <?php include('footer.php'); ?>
    <script type="text/javascript" src="//translate.google.com/translate_a/element.js?cb=googleTranslateElementInit"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/1.9.1/jquery.min.js" integrity="sha512-jGR1T3dQerLCSm/IGEGbndPwzszJBlKQ5Br9vuB0Pw2iyxOy+7AK+lJcCC8eaXyz/9du+bkCy4HXxByhxkHf+w==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="js/translate.js"></script>
    <script src="js/darkMode.js"></script>
    <script src="js_bootstrap/bootstrap.min.js"></script>
</body>
</html>