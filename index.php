<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <!-- le tag viewport est necessaire pour un affichage correct sur mobile -->
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" type="text/css" href="css_bootstrap/bootstrap.min.css" />
  <link rel="stylesheet" type="text/css" href="design.css"/>
  
  <script src="https://code.jquery.com/jquery-2.1.4.min.js"></script>
  <script src="js_bootstrap/bootstrap.min.js"></script>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/Swiper/8.4.2/swiper-bundle.css">
  <link href="http://fonts.cdnfonts.com/css/montserrat" rel="stylesheet">
  <title>HANGART</title>
</head>
<body>
  <header>
    <div class="container-fluid" id="accueil">
        <div class="row">
            <div class="col-md topbar">
              <h4 class="toptitle" >Réservez votre billet </h4>
              <img class="toptitle viptext" src="img/brush_vip.png"></h4>
            </div>
        </div>
        <div class="row">
            <div class="col-md navigation">
              <div class="divLogo">
                <img class="logo" src="img/logo_hangart.png" alt="Logo Hangart">
              </div>
              <ul class="menu">
                <li><a href="#accueil">Accueil</a></li>
                <li><a href="#programme">Programme</a></li>
                <li><a href="#lieu">Lieu & Horaires</a></li>
                <li><a href="#concours">Concours</a></li>
                <li><a href="#contact">Contact</a></li>
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
                        <ul>
                          <li><a href="#" class="text_profil">Admin</a></li>
                          <li><a href="#" class="text_profil">Compte</a></li>
                          <li><a href="index.php" class="text_profil">Se déconnecter</a></li>
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
  <div class="swiper swiper1" id="swiper1">
    <div class="swiper-wrapper">
      <div class="swiper-slide">
        <img src="img/slide1.jpg" alt="">
      </div>

      <div class="swiper-slide">
        <img src="img/slide2.jpg" alt="">
      </div>

      <div class="swiper-slide">
        <img src="img/slide3.jpg" alt="">
      </div>

      <div class="swiper-slide">
        <img src="img/slide4.jpg" alt="">
      </div>


    </div>
    <div class="swiper-button-next"></div>
    <div class="swiper-button-prev"></div>
    
  </div>
  <div class="swiper-pagination"></div>
  <div class="info">
    <h3 class="info_title" id="programme">DU STREETART HORS-NORME</h3>
    <div class="line"></div>
    <p class="info_description">Bienvenue à la 1e édition du Hangart lieu de création ouvert sur l’Europe. Le Hangart est un événement de 
      street art dans lequel des artistes vous initieront à leur art. Il se déroulera dans les entrepôts des transports en commun de 
      l’agglomération du Puy en Velay où se tiendront les différents stands. Récemment, la flotte de véhicule public de la ville a été 
      renouvelée, laissant les anciens bus à l’abandon. Nous leur offrons une seconde vie avec cet événement, ils seront au cœur du 
      weekend, rénové et transformé en stand. Une fois l’événement fini, ils seront ensuite donnés aux artistes pour leur permettre 
      de poursuivre leur tournée dans les différents pays européens.</p>
  </div>
  <div class="swiper swiper2" id="swiper2">
    <div class="swiper-wrapper">
      <div class="swiper-slide slide-flex">
        <div class="slide-div-flex">
          <div class="divImage_slide2">
            <img class="img_slide2" src="img/slide1-2.jpg" alt="">
          </div>
          <p>1- Personnalisation Sneaker.
            </br></br>
            C’est une pratique qui consiste à personnaliser ses chaussures. Au cœur du sujet, la personnalisation ne date pas d’hier, 
            les prémices du custom actuel remontent en réalité aux années 70 lorsque Bill Bowerman, l’un des deux fondateurs de Nike,
            modifiait lui-même les chaussures de sport des athlètes qu’il entrainait. Aujourd’hui, la pratique a été reprise par de
            nombreux artistes indépendants, laissant exprimer leur créativité sur des chaussures.</p>
        </div>
      </div>
      <div class="swiper-slide slide-flex">
        <div class="slide-div-flex">
          <div class="divImage_slide2">
            <img class="img_slide2" src="img/slide2-2.jpg" alt="">
          </div>
          <p>2- Graffiti.
            </br></br>
            Graffiti est le nom générique donné aux dessins ou inscriptions calligraphiées, peintes, ou tracées de diverses manières sur 
            un support qui n'est pas prévu pour cela. Certains considèrent le graffiti comme une forme d'art qui mérite d'être exposée 
            dans des galeries tandis que d'autres le perçoivent comme indésirable. Cette pratique est aujourd’hui réalisée à travers le 
            monde, les artistes redoublant de créativité pour impressionner par leur art.</p>
        </div>
      </div>

      <div class="swiper-slide slide-flex">
        <div class="slide-div-flex">
          <div class="divImage_slide2">
            <img class="img_slide2" src="img/slide3-2.jpg" alt="">
          </div>
          <p>3- Sérigraphie.
            </br></br>
            La sérigraphie est une technique d’imprimerie qui utilise des pochoirs (à l'origine, des écrans de soie) interposés entre 
            l’encre et le support. Les supports utilisés peuvent être variés (papier, carton, textile, métal, verre, bois, etc.). 
            Il est aujourd’hui utilisé dans de nombreux domaines..</p>
        </div>
      </div>

      <div class="swiper-slide slide-flex">
        <div class="slide-div-flex">
          <div class="divImage_slide2">
            <img class="img_slide2" src="img/slide4-2.jpg" alt="">
          </div>
          <p>4- Personnalisation Vêtements (Nike Lab).
            </br></br>
            La mode du fast fashion fait qu’aujourd’hui lorsque vous sortez dans la rue de nombreuses personnes portent les mêmes 
            styles de vêtements. Le custom de vêtement permet de casser cette uniformisation dans le style, vous permet de porter
            des pièces uniques et d’ainsi vous démarquer. Désormais, des artistes réalisent de véritables pièces d’art mêlant style 
            et qualité.</p>
        </div>
      </div>

      <div class="swiper-slide slide-flex">
        <div class="slide-div-flex">
          <div class="divImage_slide2">
            <img class="img_slide2" src="img/slide4-2.jpg" alt="">
          </div>
          <p>5- Hip Hop.
            </br></br>
            Le hip-hop est un genre musical de musique populaire caractérisé par un rythme accompagné par son expression musicale : 
            le rap et de la culture artistique l'entourant créé à New York dans le South Bronx au début des années 1970. 
            La culture hip-hop connaît 5 disciplines : le Rap (ou MCing), le DJing, le Break dancing (ou b-boying), le Graffiti, 
              le Beatboxing.</p>
        </div>
      </div>


    </div>
    <div class="swiper-button-next"></div>
    <div class="swiper-button-prev"></div>
    
  </div>
  <div class="info2">
    <h3 class="info_title">DÉCOUVREZ LES INTERVENANTS</h3>
    <div class="line"></div>
    <div class="div_btn">
      <input type="button" class="info_btn" value="Jour 1">
      <input type="button" class="info_btn" value="Jour 2">
    </div>
    <p class="info_description">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nunc aliquam hendrerit commodo. Vestibulum vulputate dui dapibus enim mollis, ac blandit augue dapibus. Aliquam posuere
      posuere leo, a consectetur lacus dictum id. Suspendisse urna quam, sodales non iaculis at, fringilla a ante. Curabitur vitae nisi euismod, elementum augue sed, imperdiet purus. Nunc eu
      odio dignissim, tempor leo sit amet, volutpat libero. Morbi imperdiet neque lacus, non elementum odio tempor a. Morbi sit amet viverra dolor. Sed id tortor vel lectus efficitur aliquam
      sed quis urna. Suspendisse elementum id mauris eu elementum.</p>
  </div>
  <div class="div_intervenants">
    <div class="info_intervenants"> 
      <img class="img_intervenants" src="img/cercles.png" alt="">
      <img class="pp_intervenants" src="img/pp.png" alt="">
      <div class="text_intervenants">
        <h4 class="title_intervenants">Nom Prénom</h4>
        <p class="bio_intervenants">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nunc aliquam hendrerit commodo. 
          Vestibulum vulputate dui dapibus enim mollis, ac blandit augue dapibus.</p>
      </div>
    </div>
    <div class="info_intervenants"> 
      <img class="img_intervenants" src="img/cercles.png" alt="">
      <img class="pp_intervenants" src="img/pp.png" alt="">
      <div class="text_intervenants">
        <h4 class="title_intervenants">Nom Prénom</h4>
        <p class="bio_intervenants">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nunc aliquam hendrerit commodo. 
          Vestibulum vulputate dui dapibus enim mollis, ac blandit augue dapibus.</p>
      </div>
    </div>
    <div class="info_intervenants"> 
      <img class="img_intervenants" src="img/cercles.png" alt="">
      <img class="pp_intervenants" src="img/pp.png" alt="">
      <div class="text_intervenants">
        <h4 class="title_intervenants">Nom Prénom</h4>
        <p class="bio_intervenants">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nunc aliquam hendrerit commodo. 
          Vestibulum vulputate dui dapibus enim mollis, ac blandit augue dapibus.</p>
      </div>
    </div>
    <div class="info_intervenants"> 
      <img class="img_intervenants" src="img/cercles.png" alt="">
      <img class="pp_intervenants" src="img/pp.png" alt="">
      <div class="text_intervenants">
        <h4 class="title_intervenants">Nom Prénom</h4>
        <p class="bio_intervenants">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nunc aliquam hendrerit commodo. 
          Vestibulum vulputate dui dapibus enim mollis, ac blandit augue dapibus.</p>
      </div>
    </div>
    <div class="info_intervenants"> 
      <img class="img_intervenants" src="img/cercles.png" alt="">
      <img class="pp_intervenants" src="img/pp.png" alt="">
      <div class="text_intervenants">
        <h4 class="title_intervenants">Nom Prénom</h4>
        <p class="bio_intervenants">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nunc aliquam hendrerit commodo. 
          Vestibulum vulputate dui dapibus enim mollis, ac blandit augue dapibus.</p>
      </div>
    </div>
    <div class="info_intervenants"> 
      <img class="img_intervenants" src="img/cercles.png" alt="">
      <img class="pp_intervenants" src="img/pp.png" alt="">
      <div class="text_intervenants">
        <h4 class="title_intervenants">Nom Prénom</h4>
        <p class="bio_intervenants">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nunc aliquam hendrerit commodo. 
          Vestibulum vulputate dui dapibus enim mollis, ac blandit augue dapibus.</p>
      </div>
    </div>
    <div class="info_intervenants"> 
      <img class="img_intervenants" src="img/cercles.png" alt="">
      <img class="pp_intervenants" src="img/pp.png" alt="">
      <div class="text_intervenants">
        <h4 class="title_intervenants">Nom Prénom</h4>
        <p class="bio_intervenants">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nunc aliquam hendrerit commodo. 
          Vestibulum vulputate dui dapibus enim mollis, ac blandit augue dapibus.</p>
      </div>
    </div>
    <div class="info_intervenants"> 
      <img class="img_intervenants" src="img/cercles.png" alt="">
      <img class="pp_intervenants" src="img/pp.png" alt="">
      <div class="text_intervenants">
        <h4 class="title_intervenants">Nom Prénom</h4>
        <p class="bio_intervenants">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nunc aliquam hendrerit commodo. 
          Vestibulum vulputate dui dapibus enim mollis, ac blandit augue dapibus.</p>
      </div>
    </div>
  </div>
  <div class="section_map">
    <h3 class="info_title" id="lieu">LIEU & HORAIRES</h3>
    <div class="line"></div>
    <div class="global_map">
      <div class="info_map">
        <div class="div_map">
          <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2818.99142479641!2d3.9221753154152874!3d45.04539587909817!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x47f5f07e2b87e4df%3A0xf4b12ac0573ec759!2s4%20Rte%20de%20Coubon%2C%2043700%20Brives-Charensac!5e0!3m2!1sfr!2sfr!4v1666621926071!5m2!1sfr!2sfr" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
        </div>
        <div class="text_map">
          <h4 class="title_map">WHERE TO FIND US</h4>
          <p>Nos équipes seront heureuses de vous accueillir au cours du week-end du 27 au 28 mai au 4 Rte de Coubon, 43700 Brives-Charensac.</p>
          <ul>
            <li>L'équipe du</li>
            <li>Hangart</li>
          </ul>
        </div>
        

      </div>
    </div>
  </div>
  <div class="section_lots">
    <h3 class="concours_title" id="concours">PARTICIPEZ AU CONCOURS</h3>
    <div class="line_lots"></div>
    <div class="bandeau_lots">
      <h4>LOTS A GAGNER</h4>
    </div>
    <div class="col-md-10 form">
      <form class="index_form">
        
        <div class="mb-3">
          <label for="" class="form-label">Nom</label>
          <input type="text" class="form-control" aria-describedby="emailHelp">
          
        </div>
        <div class="mb-3">
          <label for="" class="form-label">Prenom</label>
          <input type="text" class="form-control">
        </div>
        <div class="mb-3">
          <label for="" class="form-label">Adresse Mail</label>
          <input type="email" class="form-control" aria-describedby="emailHelp">
          
        </div>
        <div class="mb-3">
          <label for="" class="form-label">Mot de Passe</label>
          <input type="password" class="form-control">
        </div>
        
        <button type="submit" class="btn btn-primary">Envoyer</button>
      </form>
  </div>
  <footer>
    <div class="footer_left" id="contact">
      <img src="img/logo_blanc.png" alt="">
      <p>L'événement Hangart se répand dans l’Europe d’ici 2023 et ramène un concept nouveau en accueillant son public dans des entrepôts
         afin d’être initié à plusieurs activités et notamment personnaliser des bus inutilisés de la ville par des graffitis. 
         Le but est de rassembler différents artistes venant de plusieurs pays européens et de créer une communauté plus forte 
         autour du street art.</p>
    </div>
    <div class="footer_center">
      <h3 class="footer_title">LIENS</h3>
      <div class="footer_line"></div>
      <ul class="footer_menu">
        <li><h5>></h5><a href="#accueil">Accueil</a></li>
        <li><h5>></h5><a href="#programme">Programme</a></li>
        <li><h5>></h5><a href="#lieu">Lieu & Horaires</a></li>
        <li><h5>></h5><a href="#concours">Concours</a></li>
      </ul>
    </div>
    <div class="footer_right">
      <h3 class="footer_title">CONTACTEZ-NOUS</h3>
      <div class="footer_line"></div>
        <p>4 Rte de Coubon, 43700 Brives-Charensac</p>
        <h4>Tél : 07 81 84 69 90</h4>
        <h4>Adresse Mail : LeHangart@gmail.com</h4>
        <div class="flex_reseaux">
          <img src="img/facebook.png" alt="">
          <img src="img/instagram.png" alt="">
          <img src="img/twitter.png" alt="">
        </div>
    </div>
  </footer>
  <script src="https://cdn.jsdelivr.net/npm/swiper/swiper-bundle.min.js"></script>
  <script src="library.js"></script>
</body>
</html>