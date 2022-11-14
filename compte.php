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
  <meta name="description" content="It is a website created on the occasion of the event organized by Hangart, in order to promote the activities proposed on the theme of Street Art">
  <link rel="icon" type="images/x-icon" href="img/favicon.ico" />
  <link rel="stylesheet" type="text/css" href="css_bootstrap/bootstrap.min.css" />
  <link rel="stylesheet" type="text/css" href="css/design.css"/>
  <link href="http://fonts.cdnfonts.com/css/montserrat" rel="stylesheet">
  <title>HANGART - Account</title>
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
  <div class="divglobal_compte">
    <div class="div_global_form">
      <div class="log_form">
        <h2>ACCOUNT INFORMATION</h2>
        <div class="line"></div>    
        <?php 
          $requete='SELECT * FROM profil WHERE id_profil="'.$_GET['id'].'"';
          $resultats=$bdd->query($requete);
          $tabCompte = $resultats->fetchAll();
          $resultats->closeCursor();
          echo '<p class="last_name"><b>Last Name : </b>'.$tabCompte[0]['nom_profil'].'</p>';
          echo '<p><b>First Name : </b>'.$tabCompte[0]['prenom_profil'].'</p>';
          echo '<p><b>E-mail : </b>'.$tabCompte[0]['email_profil'].'</p>';
          echo '<p><b>Password : </b>'.$tabCompte[0]['mdp_profil'].'</p>';
          echo '<p><b>Postal Adress : </b>'.$tabCompte[0]['adresse_profil'].'</p>';
          echo '<p><b>Mobile : </b>'.$tabCompte[0]['tel_profil'].'</p>';
          echo '<div class="div_btn_compte"><a href="form_compte.php?id='.$_GET['id'].'"><button class="btn">EDIT</button></a></div>';
        ?>  
      </div>      
    </div>
  </div>
  <?php include('footer.php'); ?>
  <script type="text/javascript" src="//translate.google.com/translate_a/element.js?cb=googleTranslateElementInit"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/1.9.1/jquery.min.js" integrity="sha512-jGR1T3dQerLCSm/IGEGbndPwzszJBlKQ5Br9vuB0Pw2iyxOy+7AK+lJcCC8eaXyz/9du+bkCy4HXxByhxkHf+w==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
  <script src="js/translate.js"></script>
  <script src="js/darkMode.js"></script>
  <script src="js_bootstrap/bootstrap.min.js"></script>
</body>
</html>
