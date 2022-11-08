<?php 
  //appel du fichier contenant les differents identifiants pour se connecter a la base de donnee
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
  <link rel="stylesheet" type="text/css" href="design.css"/>
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
  <div class="swiper swiper1" id="swiper1">
    <div class="swiper-wrapper">
      <div class="swiper-slide">
        <img src="img/img-slide1/HANGART-3.png" alt="slider image 1">
      </div>
      <div class="swiper-slide">
        <img src="img/img-slide1/HANGART-1.png" alt="slider image 2">
      </div>
      <div class="swiper-slide">
        <img src="img/img-slide1/HANGART-4.png" alt="slider image 3">
      </div>
      <div class="swiper-slide">
        <img src="img/img-slide1/HANGART-2.png" alt="slider image 4">
      </div>
    </div>
    <div class="swiper-button-next"></div>
    <div class="swiper-button-prev"></div>
  </div>
  <div class="swiper-pagination"></div>
  <div class="info">
    <h3 class="info_title" id="programme">OUTSTANDING STREET ART</h3>
    <div class="line"></div>
    <p class="info_description">Welcome to the 1st edition of the Hangart place of creation open to Europe. Hangart is a street art event 
      in which artists will introduce you to their art. It will take place in the public transport warehouses of the agglomeration of 
      Puy en Velay where the various stands will be held. Recently, the city’s public vehicle fleet has been renewed, leaving the old 
      buses abandoned. We offer them a second life with this event, they will be at the heart of the weekend, renovated and transformed 
      into a stand. Once the event is over, they will then be given to the artists to allow them to continue their tour in the different 
      European countries.</p>
  </div>
  <div class="swiper swiper2" id="swiper2">
    <div class="swiper-wrapper">
      <div class="swiper-slide slide-flex">
        <div class="slide-div-flex">
          <div class="divImage_slide2">
            <img class="img_slide2" src="img/img-slide2/sneakers.png" alt="slider 2 image 1 sneakers">
          </div>
          <p><b>1 - Custom Sneakers</b>
            </br></br>
            It is a practice to customize your shoes. At the heart of the subject, personalization is not new, the beginnings of the 
            current custom actually go back to the 70s when Bill Bowerman, one of the two founders of Nike, modified the sports shoes 
            of the athletes he trained. Today, the practice has been taken up by many independent artists, allowing their creativity 
            to be expressed on shoes.</p>
        </div>
      </div>
      <div class="swiper-slide slide-flex">
        <div class="slide-div-flex">
          <div class="divImage_slide2">
            <img class="img_slide2" src="img/img-slide2/graffiti.png" alt="slider 2 image 2 graffiti">
          </div>
          <p><b>2 - Graffiti</b>
            </br></br>
            Graffiti is the generic name given to calligraphic drawings or inscriptions, painted, or drawn in various ways on a medium 
            that is not intended for this purpose. Some consider graffiti as an art form that deserves to be exhibited in galleries 
            while others perceive it as undesirable. This practice is now carried out throughout the world, artists redoubling their 
            creativity to impress with their art..</p>
        </div>
      </div>
      <div class="swiper-slide slide-flex">
        <div class="slide-div-flex">
          <div class="divImage_slide2">
            <img class="img_slide2" src="img/img-slide2/serigraphie.png" alt="slider 2 image 3 serigraphie">
          </div>
          <p><b>3 - Silkscreen Printing</b>
            </br></br>
            Silkscreen Printing is a printing technique that uses stencils (originally silk screens) interposed between the ink and the 
            substrate. The supports used can be varied (paper, cardboard, textile, metal, glass, wood, etc.). It is now used in many 
            fields.</p>
        </div>
      </div>
      <div class="swiper-slide slide-flex">
        <div class="slide-div-flex">
          <div class="divImage_slide2">
            <img class="img_slide2" src="img/img-slide2/clothes.png" alt="slider 2 image 4 clothes">
          </div>
          <p><b>4 - Custom Clothes (Nike Lab)</b>
            </br></br>
            The fashion of fast fashion makes that today when you go out on the street many people wear the same styles of clothes. 
            The custom garment allows to break this uniformity in style, allows you to wear unique pieces and thus to stand out. 
            From now on, artists produce genuine pieces of art combining style and quality.</p>
        </div>
      </div>
      <div class="swiper-slide slide-flex">
        <div class="slide-div-flex">
          <div class="divImage_slide2">
            <img class="img_slide2" src="img/img-slide2/hiphop.png" alt="slider 2 image 5 hip-hop">
          </div>
          <p><b>5 - Hip Hop</b>
            </br></br>
            Hip-hop is a genre of popular music characterized by a rhythm accompanied by its musical expression: rap and the surrounding 
            artistic culture created in New York in the South Bronx in the early 1970s. Hip-hop culture knows 5 disciplines: 
            Rap (or MCing), DJing, Break dancing (or b-boying), Graffiti, Beatboxing.</p>
        </div>
      </div>
    </div>
    <div class="swiper-button-next"></div>
    <div class="swiper-button-prev"></div>
  </div>
  <div class="info2">
    <h3 class="info_title">DISCOVER THE GUESTS</h3>
    <div class="line"></div>
    <div class="div_btn">
      <input type="button" class="info_btn" value="27 May 2023">
    </div>
    <p class="info_description">It is with pleasure that we welcome you to the Hangart. Our different teams will be at your disposal for all requests of 
    information on the program of the event as well as information on the various stakeholders.
    For the various speakers present, we let you check the information below.</p>
  </div>
  <div class="div_intervenants">
    <?php 
      $requete='SELECT * FROM intervenants';
      $resultats=$bdd->query($requete);
      $tabIntervenants = $resultats->fetchAll();
      $resultats->closeCursor();
      $nbIntervenants = count($tabIntervenants);
      for($i=0; $i < $nbIntervenants; $i++){
        echo '<div class="info_intervenants">';
        echo '<img class="img_intervenants" src="img/intervenants/cercles.png" alt="yellow cercle">';
        echo '<img class="pp_intervenants" src="img/intervenants/'.$tabIntervenants[$i]['img_intervenants'].'" alt="speakers image">';
        echo '<div class="text_intervenants">
                <h4 class="title_intervenants">'.$tabIntervenants[$i]['nom_intervenants'].' '.$tabIntervenants[$i]['prenom_intervenants'].'</h4>
                <p class="bio_intervenants">'.$tabIntervenants[$i]['bio_intervenants'].'</p>
              </div>
            </div>
          ';
      } 
    ?>
  </div>
  <div class="section_map">
    <h3 class="info_title" id="lieu">LOCATION & SCHEDULES</h3>
    <div class="line"></div>
    <div class="global_map">
      <div class="info_map">
        <div class="div_map">
          <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2818.99142479641!2d3.9221753154152874!3d45.04539587909817!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x47f5f07e2b87e4df%3A0xf4b12ac0573ec759!2s4%20Rte%20de%20Coubon%2C%2043700%20Brives-Charensac!5e0!3m2!1sfr!2sfr!4v1666621926071!5m2!1sfr!2sfr" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
        </div>
        <div class="text_map">
          <h4 class="title_map">WHERE TO FIND US</h4>
          <p>Our teams will be happy to welcome you during the weekend of May 27 to 28 at 4 Rte de Coubon, 43700 Brives-Charensac.</p>
          <div>
            <p class="horaires">SATURDAY 27 May 2023 (10AM to 10PM)</p>
            <p class="horaires">SUNDAY 28 May 2023 (10AM to 12AM)</p>
          </div>
        </div>
      </div>
    </div>
  </div>
  <div class="section_lots">
    <h3 class="concours_title" id="concours">PARTICIPATE IN THE CONTEST</h3>
    <div class="line_lots"></div>
    <div class="bandeau_lots">
      <h4>PRIZES TO WIN</h4>
    </div>
    <div class="col-md-10 form">
      <form class="index_form">
        <?php
          $requete='SELECT * FROM lots';
          $resultats=$bdd->query($requete);
          $tabLots = $resultats->fetchAll();
          $resultats->closeCursor();
          $nbLots = count($tabLots);
          for($i=0; $i < $nbLots; $i++){
            echo'
              <div class="mb-4">
                <h5><b>'.$tabLots[$i]['nom_lots'].':</b></h5>
                <h5>'.$tabLots[$i]['description_lots'].'</h5>
              </div>
            ';
          }
        ?>  
      </form>
  </div>
  <footer>
    <div class="footer_left" id="contact">
      <img src="img/logo_blanc.png" alt="white hangart logo">
      <p>The Hangart event is spreading across Europe by 2023 and brings back a new concept by welcoming its public in warehouses to be 
        introduced to several activities and in particular customize unused buses of the city by graffiti. The aim is to bring together 
        different artists from several European countries and create a stronger community around street art.</p>
    </div>
    <div class="footer_center">
      <h3 class="footer_title">LINKS</h3>
      <div class="footer_line"></div>
      <ul class="footer_menu">
        <li><h5>></h5><a href="#accueil">Home</a></li>
        <li><h5>></h5><a href="#programme">Program</a></li>
        <li><h5>></h5><a href="#lieu">Location & Schedules</a></li>
        <li><h5>></h5><a href="#concours">Contest</a></li>
      </ul>
    </div>
    <div class="footer_right">
      <h3 class="footer_title">CONTACT US</h3>
      <div class="footer_line"></div>
        <p>8 Rue Jean Batiste Fabre, 43000, Le Puy-en-Velay</p>
        <h4>Phone number : 07 81 84 69 90<</h4>
        <h4>E-mail : LeHangart@gmail.com</h4>
        <div class="flex_reseaux">
          <img src="img/facebook.png" alt="facebook icon">
          <img src="img/instagram.png" alt="instagram icon">
          <img src="img/twitter.png" alt="twitter icon">
        </div>
    </div>
  </footer>
  <script src="https://cdn.jsdelivr.net/npm/swiper/swiper-bundle.min.js"></script>
  <script src="library.js"></script>
</body>
</html>