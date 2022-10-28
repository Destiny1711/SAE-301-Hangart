<?php
   include("../parametre/parametre.php") ;
   include('recap_lots.php');
   //connexion a la base de donnee
   session_start() ;
    //connexion a la base de donnee
    
    $bdd = new PDO('mysql:host='.$hote.';port='.$port.';dbname='.$nombase,$utilisateur,$mdp);
    $requete='SELECT * FROM concours';
    $resultats = $bdd->query($requete) ;
    $tabconcours=$resultats->fetchAll() ;
    $resultats->closeCursor() ;
    $nbconcours=count($tabconcours);
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <!-- le tag viewport est necessaire pour un affichage correct sur mobile -->
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" type="text/css" href="../css_bootstrap/bootstrap.min.css" />
        <link href="../design.css" rel="stylesheet">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <link href="http://fonts.cdnfonts.com/css/montserrat" rel="stylesheet">
        <title>Page administrateur</title>
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
                                      </ul>';
                                }
                                ?>
                                
                                </li>
                            </ul>
                            </div>
                        </div>
                    
                    </div>
                </div>
            </div>
        </header>
        <div class="containerForm">
            <!--formulaire pour rentrer info sur lots-->
            <form method="POST" action="formulaire_lot.php" enctype="multipart/form-data">  
                <div class="blocForm">
                    <h2>INFORMATIONS DU LOT</h2>
                    <div class="formulaire2" >
                        <div class="champs">
                            <label for="nom_lots">Nom du lot</label>
                            <input class="input-group" type="text" name="nom_lots" >
                        </div>
                        <div class="bio-area">
                            <label for="desc_lots">Description du lot</label>
                            <textarea class="input-group" id="bio" name="description_lots"></textarea>
                        </div>
                    </div>         
                    <div class="select">
                        <select class="list" name="id_concours">
                            <option value="">--Choisir un concours--</option>
                            <?php
                                for($i=0; $i<$nbconcours; $i++){
                                    echo '<option value="'.$tabconcours[$i]["id_concours"].'">'.$tabconcours[$i]["nom_concours"].'</option>';
                                }
                            ?>
                        </select>
                    </div>
                    <div class="envoyer">
                        <input class="btn1" type="submit" name="soumettre4" value="Envoyer">
                        <input class="btn1" type="reset" name="annuler" value="Annuler"> 
                    </div>
                </div>
            </form>
            <?php 
            $requete='SELECT * FROM lots';
            $resultats = $bdd->query($requete) ;
            $tablots=$resultats->fetchAll() ;
            $resultats->closeCursor() ;
            $nblots=count($tablots);
        
            $listlots=array();
            for ($i=0; $i<$nblots ; $i++){
                $listlots[$i]= new lots ($tablots[$i][1],$tablots[$i][2]);
                echo'
                <form action="annexe_lots.php?id='.$_GET['id'].'&i='.$tablots[$i][0].'" method="POST">
                    <input type="submit" name="soumettre" value="Supprimer">
                </form>
                <form action="modif_lots.php?id='.$_GET['id'].'&id_lots='.$tablots[$i][0].'" method="POST">
                    <input type="submit" value="Modifier">
                </form>';
            }
            
            ?>
            <div class="boutons">
                <?php 
                echo '
                <a class="btn3" href="formulaire_concours.php?id='.$_GET['id'].'"">
                    <button>< Retour</button>
                </a> 
                <a class="btn2" href="formulaire_act.php?id='.$_GET['id'].'"">
                    <button>Suivant ></button>
                </a>';
                ?>
            </div>
        </div>
        <footer>
            <div class="footer_left" id="contact">
                <img src="../img/logo_blanc.png" alt="">
                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nunc aliquam hendrerit commodo. Vestibulum vulputate dui dapibus enim mollis, ac blandit augue dapibus. Aliquam posuere
                    posuere leo, a consectetur lacus dictum id. Suspendisse urna quam, sodales non iaculis at, fringilla a ante. Curabitur vitae nisi euismod, elementum augue sed, imperdiet purus. Nunc eu
                    odio dignissim, tempor leo sit amet, volutpat libero. Morbi imperdiet neque lacus, non elementum odio tempor a. Morbi sit amet viverra dolor. Sed id tortor vel lectus efficitur aliquam
                    sed quis urna. Suspendisse elementum id mauris eu elementum.</p>
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
    </body>
</html>
<!--******************************************************************************-->
