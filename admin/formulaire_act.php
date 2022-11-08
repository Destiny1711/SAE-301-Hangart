<?php
    //appel du fichier contenant les differents identifiants pour se connecter a la base de donnee
    include("../parametre/parametre.php");
    include("recap_act.php") ;
    //connexion a la base de donnee
    session_start() ;
    $bdd = new PDO('mysql:host='.$hote.';port='.$port.';dbname='.$nombase,$utilisateur,$mdp);
?>
<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="icon" type="images/x-icon" href="img/favicon.ico" />
  <link rel="stylesheet" type="text/css" href="../css_bootstrap/bootstrap.min.css" />
  <link rel="stylesheet" type="text/css" href="../design.css"/>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/Swiper/8.4.2/swiper-bundle.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <link href="http://fonts.cdnfonts.com/css/montserrat" rel="stylesheet">
  <title>HANGART - ADMIN</title>
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
                        <img class="icon_connect" src="img/profil.png" alt="Icône Profil">
                        <div class="compte">
                            <ul class="profil_list">
                                <li>
                                    <?php 
                                        if(!isset($_GET['id'])){
                                            echo '<a class="text_profil" href="../login.php">Se connecter</a>';
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
                                                </ul>
                                            ';
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
    <div class="containerForm">
        <!--formulaire pour rentrer info sur activité-->
        <?php 
        echo'
        <form method="POST" action="annexe_act.php?id='.$_GET['id'].'" enctype="multipart/form-data">'; ?> 
            <div class="blocForm">
                <h2>INFORMATIONS ACTIVITÉ</h2>
                <div class="formulaire">
                    <div class="champs">
                        <label for="nom_act">Nom de l'activité</label>
                        <input class="input-group" type="text" name="nom_act" placeholder="ex : Graffiti">
                    </div>
                    <div class="champs">
                        <label for="date_act">Date de l'activité</label>
                        <input class="input-group" type="date" name="date_act" >
                    </div>
                    <div class="champs">
                        <label for="horaires_act">Horaires de l'activité</label>
                        <input class="input-group" type="time" name="horaires_act" >
                    </div>
                </div>
                <div class="upload">
                    <label for="image"></label>
                    <button type="button" class="btn-dl">
                        <input type="file" name="image">
                        <i class="fa fa-upload"></i> Ajouter une image 
                    </button>
                </div>
                <div class="envoyer">
		    <input class="btn1" type="reset" name="annuler" value="Annuler"> 
                    <input class="btn" type="submit" name="soumettre1" value="Ajouter">
                </div>
                <?php
                    $requete='SELECT * FROM activite';
                    $resultats = $bdd->query($requete) ;
                    $tabact=$resultats->fetchAll() ;
                    $resultats->closeCursor() ;
                    $nbact=count($tabact);
                    $listactivite=array();
                    for ($i=0; $i<$nbact ; $i++){
                        $listactivite[$i]= new activite ($tabact[$i][1],$tabact[$i][2],$tabact[$i][3]);
                        echo'
                            <div class="envoyer2">
                                <form action="annexe_act.php?id='.$_GET['id'].'&i='.$tabact[$i][0].'" method="POST">
                                    <input class="btn1" type="submit" name="soumettre" value="Supprimer">
                                </form>
                                <form action="modif_act.php?id='.$_GET['id'].'&i='.$tabact[$i][0].'" method="POST">
                                    <input class="btn" type="submit" value="Modifier">
                                </form>
                            </div>
                        ';
                    }
                ?>
            </div>
        </form>
        <div class="boutons">
            <?php 
                echo '
                    <a href="pagePasserelle.php?id='.$_GET['id'].'"">
                        <button>< Retour</button>
                    </a> 
                    <a href="formulaire_intervenant.php?id='.$_GET['id'].'"">
                        <button>Suivant ></button>
                    </a> 
                ';
            ?>
        </div> 
    </div>
    <footer>
        <div class="footer_left" id="contact">
            <img src="../img/logo_blanc.png" alt="">
            <p>L’événement Hangart se répand à travers l’Europe d’ici 2023 et ramène un nouveau concept en accueillant son public dans des entrepôts pour s’initier à plusieurs activités et notamment personnaliser les bus inutilisés de la ville par des graffitis. Le but est de réunir différents artistes de plusieurs pays européens et de créer une communauté plus forte autour du street art.</p>
        </div>
        <div class="footer_center">
            <h3 class="footer_title">LIENS</h3>
            <div class="footer_line"></div>
            <ul class="footer_menu">
                <?php 
                    echo'
                        <li><h5>></h5><a href="../index.php?id='.$_GET['id'].'#accueil">Accueil</a></li>
                        <li><h5>></h5><a href="../index.php?id='.$_GET['id'].'#programme">Programme</a></li>
                        <li><h5>></h5><a href="../index.php?id='.$_GET['id'].'#lieu">Lieu & Horaires</a></li>
                        <li><h5>></h5><a href="../index.php?id='.$_GET['id'].'#concours">Concours</a></li>
                    ';
                ?>
            </ul>
        </div>
        <div class="footer_right">
            <h3 class="footer_title">CONTACTEZ-NOUS</h3>
            <div class="footer_line"></div>
            <p>8 Rue Jean Batiste Fabre, 43000, Le Puy-en-Velay</p>
            <h4>Téléphone : 07 81 84 69 90</h4>
            <h4>Adresse mail : LeHangart@gmail.com</h4>
            <div class="flex_reseaux">
                <img src="../img/facebook.png" alt="">
                <img src="../img/instagram.png" alt="">
                <img src="../img/twitter.png" alt="">
            </div>
        </div>
    </footer>
</body>
</html>
    