<?php 
  //appel du fichier contenant les differents identifiants pour se connecter a la base de donnee
  include("parametre/parametre.php") ;
  //connexion a la base de donnee
  $bdd = new PDO('mysql:host='.$hote.';port='.$port.';dbname='.$nombase,$utilisateur,$mdp);

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="images/x-icon" href="img/favicon.ico" />
    <link rel="stylesheet" type="text/css" href="css_bootstrap/bootstrap.min.css" />
    <link rel="stylesheet" type="text/css" href="css/design.css"/>
    <script src="https://code.jquery.com/jquery-2.1.4.min.js"></script>
    <script src="js_bootstrap/bootstrap.min.js"></script>
    <link href="http://fonts.cdnfonts.com/css/montserrat" rel="stylesheet">
    <title>Hangart - 404 Not Found</title>
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
  <div class="div_404">
    <h2 class="title_404">404 Not Found</h2>
    <p class="info_404">Cette page n'existe pas veuillez retourner sur la page d'accueil</p>
    <?php 
    if(isset($_GET['id'])){
    echo'
    <form class="div_concours" action="index.php?id='.$_GET['id'].'">
      <input type="submit" class="info_btn" value="Retourner à l\'accueil">
    </form>'; 
    } else { 
    echo'
    <form class="div_concours" action="index.php">
      <input type="submit" class="info_btn" value="Retourner à l\'accueil">
    </form>'; 
    }
    ?>
  </div>
  <?php include('footer.php'); ?>
  <script type="text/javascript" src="//translate.google.com/translate_a/element.js?cb=googleTranslateElementInit"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/1.9.1/jquery.min.js" integrity="sha512-jGR1T3dQerLCSm/IGEGbndPwzszJBlKQ5Br9vuB0Pw2iyxOy+7AK+lJcCC8eaXyz/9du+bkCy4HXxByhxkHf+w==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
  <script src="https://cdn.jsdelivr.net/npm/swiper/swiper-bundle.min.js"></script>
  <script src="js/translate.js"></script>
  <script src="js/darkMode.js"></script>
  <script src="js_bootstrap/bootstrap.min.js"></script>
  <script src="js/library.js"></script>
  <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
  <script> AOS.init();</script>
</body>
</html>