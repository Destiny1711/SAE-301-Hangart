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
  <link rel="icon" type="images/x-icon" href="img/favicon.ico" />
  <link rel="stylesheet" type="text/css" href="css_bootstrap/bootstrap.min.css" />
  <link rel="stylesheet" type="text/css" href="css/design.css"/>
  <link href="http://fonts.cdnfonts.com/css/montserrat" rel="stylesheet">
  <title>HANGART - ADMIN</title>
</head>
<body>
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
                        <li><a href="index.php?id='.$_GET['id'].'#accueil">Accueil</a></li>
                        <li><a href="index.php?id='.$_GET['id'].'#programme">Programme</a></li>
                        <li><a href="index.php?id='.$_GET['id'].'#lieu">Lieu & Horaires</a></li>
                        <li><a href="index.php?id='.$_GET['id'].'#concours">Concours</a></li>
                        <li><a href="index.php?id='.$_GET['id'].'#contact">Contact</a></li>';
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
    <div class="div_global_form">
        <form class="log_form" method="POST" enctype="multipart/form-data">  
            <h2>ACCOUNT INFORMATION</h2>
            <div class="line"></div>
            <div style="width:100%; margin-bottom:2vw; text-align:center;">Warning : All information entered are all new values</div>
            <div class="mb-3 div_form_signin">
                <label for="" class="form-label">Last Name</label>
                <input type="name" class="form-control" name="nom_profil" aria-describedby="emailHelp" required>
            </div>
            <div class="mb-3 div_form_signin">
                <label for="" class="form-label">First Name</label>
                <input type="name" name="prenom_profil" class="form-control" required>
            </div>
            <div class="mb-3 div_form_signin">
                <label for="" class="form-label">E-mail</label>
                <input type="email" name="email_profil" class="form-control" aria-describedby="emailHelp" required>  
            </div>
            <div class="mb-3 div_form_signin">
                <label for="" class="form-label">Password</label>
                <input type="password" name="mdp_profil" class="form-control" required>
            </div>
            <div class="mb-3 div_form_signin">
                <label for="" class="form-label">Postal Adress</label>
                <input type="text" name="adresse_profil" class="form-control" required>
            </div>
            <div class="mb-3 div_form_signin">
                <label for="" class="form-label">Mobile</label>
                <input type="number" name="tel_profil" class="form-control" required>
            </div>
            <input class="btn" type="submit" name="btn" value="Send">
            <?php 
                if (isset($_POST['btn'])){
                /** Execute une requete sql verifiant si le mail saisit existe dans la table*/
                    $requete='UPDATE profil SET 
                    nom_profil="'.$_POST['nom_profil'].'", 
                    prenom_profil="'.$_POST['prenom_profil'].'",
                    email_profil="'.$_POST['email_profil'].'",
                    mdp_profil="'.$_POST['mdp_profil'].'",
                    adresse_profil="'.$_POST['adresse_profil'].'",
                    tel_profil="'.$_POST['tel_profil'].'"
                    WHERE id_profil="'.$_GET['id'].'"';
                    $resultats=$bdd->query($requete);
                    $tabCompte = $resultats->fetchAll();
                    $resultats->closeCursor();
                }
            ?>
        </form>
    </div>
    <?php include('footer.php'); ?>
</body>
</html>