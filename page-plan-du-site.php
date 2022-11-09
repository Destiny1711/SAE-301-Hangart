<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="description" content="It is a website created on the occasion of the event organized by Hangart, in order to promote the activities proposed on the theme of Street Art">
  <link rel="icon" type="images/x-icon" href="img/favicon.ico" />
  <link rel="stylesheet" type="text/css" href="css_bootstrap/bootstrap.min.css" />
  <link rel="stylesheet" type="text/css" href="css/design.css"/>
  <script src="https://code.jquery.com/jquery-2.1.4.min.js"></script>
  <script src="js_bootstrap/bootstrap.min.js"></script>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/Swiper/8.4.2/swiper-bundle.css">
  <link href="http://fonts.cdnfonts.com/css/montserrat" rel="stylesheet">
  <title>HANGART Street Art</title>
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
                <li><a href="#accueil">Home</a></li>
                <li><a href="#programme">Program</a></li>
                <li><a href="#lieu">Location & Schedules</a></li>
                <li><a href="#concours">Contest</a></li>
                <li><a href="#contact">Contact</a></li>
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
                              echo '<li><a href="compte.php?id='.$_GET['id'].'" class="text_profil">Compte</a></li>
                              <li><a href="index.php" class="text_profil">Se déconnecter</a></li>
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
  <div class="info2">
        <h3 class="info_title">SITE PLAN</h3>
        <div class="line"></div>
  </div>  
  <div class="section_plan-du-site">

    <div class="global_map">
      <div class="info_plan-du-site">
        <div class="text_plan-du-site">
          <h4 class="title_plan"><a href="#accueil">HOME</a></h4>
          
          <h4 class="title_plan"><a href="#programme">PROGRAM</a></h4>
          
          <h4 class="title_plan"><a href="#lieu">LOCATION & SCHEDULES</a></h4>
          
          <h4 class="title_plan"><a href="#concours">CONTEST</a></h4>
          
          <h4 class="title_plan"><a href="#contact">CONTACT</a></h4>
        
          <h4 class="title_plan"><a href="login.php">CONNECTION</a></h4>
        
        </div>
      </div>
    </div>
  </div>
 
  </div>
  <?php include('footer.php'); ?>
  <script src="https://cdn.jsdelivr.net/npm/swiper/swiper-bundle.min.js"></script>
  <script src="js/library.js"></script>
</body>
</html>
