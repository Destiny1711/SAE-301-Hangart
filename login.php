<?php 
  //appel du fichier contenant les differents identifiants pour se connecter a la base de donnee
  include("parametre/parametre.php");
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
  <link rel="stylesheet" href="css/swiper-bundle.css">
  <link href="http://fonts.cdnfonts.com/css/montserrat" rel="stylesheet">
  <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
  <title>HANGART - Login</title>
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
            <?php 
              echo'
              <li><a href="index.php?id='.$_GET['id'].'#accueil">Accueil</a></li>
              <li><a href="index.php?id='.$_GET['id'].'#programme">Programme</a></li>
              <li><a href="index.php?id='.$_GET['id'].'#lieu">Lieu & Horaires</a></li>
              <li><a href="index.php?id='.$_GET['id'].'#concours">Concours</a></li>
              <li><a href="index.php?id='.$_GET['id'].'#contact">Contact</a></li>';
              ?>
          </ul>
          <div class="profil"></div>
        </div>
      </div>
    </div>
  </header>
  <div class="col-md-10 div_global_form">
    <form class="log_form" method="POST">
      <div class="mb-3 img_log">
        <img src="img/logo_hangart.png" class="logo_log" alt="">
      </div>
      <div class="mb-3 div_form">
        <label for="" class="form-label">E-mail</label>
        <input type="email" name="email_profil" class="form-control" aria-describedby="emailHelp">
      </div>
      <div class="mb-3 div_form">
        <label for="" class="form-label">Password</label>
        <input type="password" name="mdp_profil" class="form-control">
      </div>
      <p>Don't have an account ? <a href="signin.php">Create an account</a></p>
      <button type="submit" class="btn">Send</button>
      <?php
        /** Verifie que les champs ne sont pas vides**/
        if (isset($_POST['email_profil'])){
          $requete='SELECT * FROM profil WHERE email_profil="'.$_POST['email_profil'].'"';
          $resultats=$bdd->query($requete);
          $tabMail = $resultats->fetchAll();
          $resultats->closeCursor();
          $nbMail = count($tabMail);
          if ($nbMail==0){
            echo "<p style='text-align:center; color:red; padding-top:2vw;'>L'email saisit est incorrect</p>";
          }
          /** Execute une requete sql verifiant si le mail saisit existe dans la table*/
          $requete='SELECT * FROM profil WHERE mdp_profil="'.md5($_POST['mdp_profil']).'"';
          $resultats=$bdd->query($requete);
          $tabPassword = $resultats->fetchAll();
          $resultats->closeCursor();
          $nbPassword = count($tabPassword);
          if ($nbPassword==0) {
            echo "<p style='text-align:center; color:red;'>Le mot de passe est incorrect</p>";
          }
          if ($nbMail==1 && $nbPassword!=0) {
            header('Location: index.php?id='.$tabMail[0]['id_profil']);
          }
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
  <script src="js/library.js"></script>
  <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
  <script> AOS.init();</script>
</body>
</html>