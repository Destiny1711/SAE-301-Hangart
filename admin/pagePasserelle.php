<?php 
 //appel du fichier contenant les differents identifiants pour se connecter a la base de donnee
 include("../parametre/parametre.php") ;

 //connexion a la base de donnee
 $bdd = new PDO('mysql:host='.$hote.';port='.$port.';dbname='.$nombase,$utilisateur,$mdp);
?>

<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <!-- le tag viewport est necessaire pour un affichage correct sur mobile -->
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" type="text/css" href="../css_bootstrap/bootstrap.min.css" />
  <link rel="stylesheet" type="text/css" href="../design.css"/>
  <script src="https://code.jquery.com/jquery-2.1.4.min.js"></script>
  <script src="../js_bootstrap/bootstrap.min.js"></script>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/Swiper/8.4.2/swiper-bundle.css">
  <link href="http://fonts.cdnfonts.com/css/montserrat" rel="stylesheet">
  <title>HANGART</title>
</head>
<body>
  <header>
    <div class="container-fluid">
        <div class="row">
            <div class="col-md navigation">
              <div class="divLogo">
                <img class="logo" src="img/logo_hangart.png" alt="Logo Hangart">
              </div>
              <ul class="menu">
              <?php echo'
                <li><a href="../index.php?id='.$_GET['id'].'#accueil">Accueil</a></li>
                <li><a href="../index.php?id='.$_GET['id'].'#programme">Programme</a></li>
                <li><a href="../index.php?id='.$_GET['id'].'#lieu">Lieu & Horaires</a></li>
                <li><a href="../index.php?id='.$_GET['id'].'#concours">Concours</a></li>
                <li><a href="../index.php?id='.$_GET['id'].'#contact">Contact</a></li>';
              ?>
              </ul>
              <div class="profil">
                <img class="icon_connect" src="img/profil.png" alt="Icône Profil">
                <div class="compte">
                  <ul class="profil_list">
                    <li>
                      <?php 
                      if(!isset($_GET['id'])){
                        echo '<a class="text_profil" href="login.php">Se connecter</a>';
                      } else {
                        echo '<a class="text_profil" href="#">Profil</a>
                        <ul>';
                        $requete='SELECT * FROM profil WHERE id_profil="1"';
                        $resultats=$bdd->query($requete);
                        $tabAdmin = $resultats->fetchAll();
                        $resultats->closeCursor();
                        if($_GET['id']==$tabAdmin[0]['id_profil']){
                          echo '<li><a href="pagePasserelle.php?id='.$_GET['id'].'" class="text_profil">Admin</a></li>';
                        }
                          echo '<li><a href="../compte.php?id='.$_GET['id'].'" class="text_profil">Compte</a></li>
                          <li><a href="../index.php" class="text_profil">Se déconnecter</a></li>
                        </ul>';
                      }
                      ?>
                      
                    </li>
                  </ul>
                </div>
                <div class="lang_div">
                <?php 
                  if(isset($_GET['id'])){
                    echo '<a href="index_en.php?id='.$_GET['id'].'"><img src="img/lang_en.png" class="lang" alt=""></a>';
                  } else { echo '<a href="index_en.php"><img src="img/lang_en.png" class="lang" alt=""></a>'; }
                  ?>
                </div>
              </div>
            </div>
        </div>
    </div>
  </header>

    <div class="info2">
        <h3 class="info_title">INFORMATIONS ADMIN</h3>
    <div class="line"></div>
    <p class="info_description">Bienvenue dans l'interface admin, vous pourrez trouver ici l'accès aux différentes informations dont la modification vous est autorisée.</p>
    </div>
    <ul class="div_btnp">
    <?php
    
      echo '<a href="formulaire_act.php?id='.$_GET['id'].'" class="info_btnp"><li>Informations Activitées</li></a>
      <a href="formulaire_intervenant.php?id='.$_GET['id'].'" class="info_btnp"><li>Informations Intervenants</li></a>
      <a href="formulaire_concours.php?id='.$_GET['id'].'" class="info_btnp"><li>Informations Concours</li></a>
      <a href="formulaire_lot.php?id='.$_GET['id'].'" class="info_btnp"><li>Informations Lots</li></a>';
    ?>
    </ul>

    <footer>
    <div class="footer_left" id="contact">
      <img src="../img/logo_blanc.png" alt="">
      <p>The Hangart event is spreading across Europe by 2023 and brings back a new concept by welcoming its public in warehouses to be 
        introduced to several activities and in particular customize unused buses of the city by graffiti. The aim is to bring together 
        different artists from several European countries and create a stronger community around street art.</p>
    </div>
    <div class="footer_center">
      <h3 class="footer_title">LIENS</h3>
      <div class="footer_line"></div>
      <ul class="footer_menu">
        <?php echo'
        <li><h5>></h5><a href="../index.php?id='.$_GET['id'].'#accueil">Accueil</a></li>
        <li><h5>></h5><a href="../index.php?id='.$_GET['id'].'#programme">Programme</a></li>
        <li><h5>></h5><a href="../index.php?id='.$_GET['id'].'#lieu">Lieu & Horaires</a></li>
        <li><h5>></h5><a href="../index.php?id='.$_GET['id'].'#concours">Concours</a></li>';
        ?>
      </ul>
    </div>
    <div class="footer_right">
      <h3 class="footer_title">CONTACTEZ-NOUS</h3>
      <div class="footer_line"></div>
        <p>8 Rue Jean Batiste Fabre, 43000, Le Puy-en-Velay</p>
        <h4>Tél :</h4>
        <h4>Adresse Mail :</h4>
        <div class="flex_reseaux">
          <img src="../img/facebook.png" alt="">
          <img src="../img/instagram.png" alt="">
          <img src="../img/twitter.png" alt="">
        </div>
    </div>
  </footer>
  <script src="https://cdn.jsdelivr.net/npm/swiper/swiper-bundle.min.js"></script>

</body>
</html>