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
    <title>Hangart 404 Not Found</title>
</head>
<body>
<header>
    <div class="container-fluid" id="accueil">
        <div class="row">
            <div class="col-md topbar">
              <h4 class="toptitle">Book a ticket</h4>
              <img class="toptitle viptext" src="img/brush_vip.png" alt="brush image"></h4>
            </div>
        </div>
        <div class="row">
            <div class="col-md navigation">
              <div class="divLogo">
                <img class="logo" src="img/logo_hangart.png" alt="Logo Hangart">
              </div>
              <ul class="menu">
                <?php 
                echo'
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
                          echo '<a class="text_profil" href="login.php">Connect</a>';
                        } else {
                          echo '<a class="text_profil" href="#">Profil</a>
                          <ul>';
                            $requete='SELECT * FROM profil WHERE id_profil="1"';
                            $resultats=$bdd->query($requete);
                            $tabAdmin = $resultats->fetchAll();
                            $resultats->closeCursor();
                            if($_GET['id']==$tabAdmin[0]['id_profil']){
                              echo '<li><a href="admin/pagePasserelle.php?id='.$tabAdmin[0]['id_profil'].'" class="text_profil">Admin</a></li>';
                            }
                              echo '<li><a href="compte.php?id='.$_GET['id'].'" class="text_profil">Account</a></li>
                              <li><a href="index.php" class="text_profil">Log Out</a></li>
                          </ul>';
                        }
                      ?>   
                    </li>
                  </ul>
                </div>
                <div class="lang_div">
                  <img src="img/lang_en.png" class="lang" alt="england flag">
                </div>
              </div>
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
</body>
</html>