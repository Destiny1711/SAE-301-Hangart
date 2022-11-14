<?php 
  //appel du fichier contenant les differents identifiants pour se connecter a la base de donnee
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
  <link href="http://fonts.cdnfonts.com/css/montserrat" rel="stylesheet">
  <title>HANGART - Admin</title>
</head>
<body>
  <header>
    <div class="container-fluid">
      <div class="row">
        <div class="col-md navigation">
          <div class="divLogo">
            <?php
              if(isset($_GET['id'])){
                echo'
                <a href="../index.php?id='.$_GET['id'].'"><img class="logo" id="logo" src="img/logo_hangart.png" alt="Logo Hangart"></a>';
              } 
              else { 
                echo'
                <a href="../index.php"><img class="logo" id="logo" src="img/logo_hangart.png" alt="Logo Hangart"></a>';
              }
            ?>
          </div>
          <ul class="menu">
            <?php 
              echo'
                <li><a href="../index.php?id='.$_GET['id'].'#accueil">Accueil</a></li>
                <li><a href="../index.php?id='.$_GET['id'].'#programme">Programme</a></li>
                <li><a href="../index.php?id='.$_GET['id'].'#lieu">Lieu & Horaires</a></li>
                <li><a href="../index.php?id='.$_GET['id'].'#concours">Concours</a></li>
                <li><a href="../index.php?id='.$_GET['id'].'#contact">Contact</a></li>
              ';
            ?>
          </ul>
          <div class="profil">
            <div class="account">
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
                  } else { 
                    echo '<a href="index_en.php"><img src="img/lang_en.png" class="lang" alt=""></a>'; 
                  }
                ?>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </header>
  <div class="containerForm">
    <div class="blocForm">
      <div class="info2">
        <h3 class="info_title">INFORMATIONS ADMINISTRATEUR</h3>
        <div class="line"></div>
        <p class="info_description">Bienvenue dans l'interface administrateur, vous pourrez trouver ici l'accès aux différentes informations dont la modification et la suppression vous sont autorisées.</p>
      </div>
      <ul class="div_btnp">
        <?php
          echo'
            <a href="formulaire_act.php?id='.$_GET['id'].'" class="info_btnp"><li>Informations Activité</li></a>
            <a href="formulaire_intervenant.php?id='.$_GET['id'].'" class="info_btnp"><li>Informations Intervenant</li></a>
            <a href="formulaire_concours.php?id='.$_GET['id'].'" class="info_btnp"><li>Informations Concours</li></a>
            <a href="formulaire_lot.php?id='.$_GET['id'].'" class="info_btnp"><li>Informations du Lot</li></a>
          ';
        ?>
      </ul>
    </div>
  </div>
  <?php include('../footer.php'); ?>
</body>
</html>