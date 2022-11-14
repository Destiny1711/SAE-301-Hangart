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
        <?php 
        if(isset($_GET['id'])){
          echo'
          <li><a href="index.php?id='.$_GET['id'].'#accueil">• Accueil</a></li>
          <li><a href="index.php?id='.$_GET['id'].'#programme">• Programme</a></li>
          <li><a href="index.php?id='.$_GET['id'].'#lieu">• Lieu & Horaires</a></li>
          <li><a href="index.php?id='.$_GET['id'].'#concours">• Concours</a></li>
          <li><a href="index.php?id='.$_GET['id'].'#contact">• Contact</a></li>
          <li><a href="plan.php?id='.$_GET['id'].'">• Plan du Site</a></li>';
        } else {
          echo '
          <li><a href="index.php#accueil">• Accueil</a></li>
          <li><a href="index.php#programme">• Programme</a></li>
          <li><a href="index.php#lieu">• Lieu & Horaires</a></li>
          <li><a href="index.php#concours">• Concours</a></li>
          <li><a href="index.php#contact">• Contact</a></li>
          <li><a href="plan.php">• Plan du Site</a></li>';
        }
        ?>
      </ul>
    </div>
    <div class="footer_right">
      <h3 class="footer_title">CONTACT US</h3>
      <div class="footer_line"></div>
        <p>8 Rue Jean Batiste Fabre, 43000, Le Puy-en-Velay</p>
        <h4>Phone number : 07 81 84 69 90</h4>
        <h4>E-mail : LeHangart@gmail.com</h4>
        <div class="flex_reseaux">
          <img src="img/facebook.png" alt="facebook icon">
          <img src="img/instagram.png" alt="instagram icon">
          <img src="img/twitter.png" alt="twitter icon">
        </div>
    </div>
</footer>
