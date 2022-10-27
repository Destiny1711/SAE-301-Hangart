<?php
    //appel du fichier contenant les differents identifiants pour se connecter a la base de donnee
    include("parametre/parametre.php") ;
    //connexion a la base de donnee
    session_start() ;
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
        <link rel="stylesheet" type="text/css" href="css_bootstrap/bootstrap.min.css" />
        <link href="style-formulaire.css" rel="stylesheet">
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
                        <li><a href="">Accueil</a></li>
                        <li><a href="">Programme</a></li>
                        <li><a href="">Lieu & Horaires</a></li>
                        <li><a href="">Concours</a></li>
                        <li><a href="">Contact</a></li>
                    </ul>
                    <div class="profil">
                        <img class="icon_connect" src="img/profil.png" alt="Icône Profil">
                        <h4>Se connecter</h4>
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
            <div class="boutons">
                <a class="btn3" href="formulaire_concours.php">
                    <button>< Retour</button>
                </a> 
                <a class="btn2" href="formulaire_act.php">
                    <button>Suivant ></button>
                </a> 
            </div>
        </div>
        <footer>
            <div class="footer_left">
            <img src="img/logo_blanc.png" alt="">
            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nunc aliquam hendrerit commodo. Vestibulum vulputate dui dapibus enim mollis, ac blandit augue dapibus. Aliquam posuere
                posuere leo, a consectetur lacus dictum id. Suspendisse urna quam, sodales non iaculis at, fringilla a ante. Curabitur vitae nisi euismod, elementum augue sed, imperdiet purus. Nunc eu
                odio dignissim, tempor leo sit amet, volutpat libero. Morbi imperdiet neque lacus, non elementum odio tempor a. Morbi sit amet viverra dolor. Sed id tortor vel lectus efficitur aliquam
                sed quis urna. Suspendisse elementum id mauris eu elementum.</p>
            </div>
            <div class="footer_center">
            <h3 class="footer_title">LIENS</h3>
            <div class="footer_line"></div>
            <ul class="footer_menu">
                <li><h5>></h5><a href="">Accueil</a></li>
                <li><h5>></h5><a href="">Programme</a></li>
                <li><h5>></h5><a href="">Lieu & Horaires</a></li>
                <li><h5>></h5><a href="">Concours</a></li>
            </ul>
            </div>
            <div class="footer_right">
            <h3 class="footer_title">CONTACTEZ-NOUS</h3>
            <div class="footer_line"></div>
                <p>8 Rue Jean Batiste Fabre, 43000, Le Puy-en-Velay</p>
                <h4>Tèl :</h4>
                <h4>Adresse Mail</h4>
                <div class="flex_reseaux">
                <img src="img/facebook.png" alt="">
                <img src="img/instagram.png" alt="">
                <img src="img/twitter.png" alt="">
                </div>
            </div>
        </footer>
    </body>
</html>
<!--******************************************************************************-->
<?php
//recuperation des données des lots
if (isset($_POST['soumettre4'])) {
    $sql='INSERT INTO lots(nom_lots,description_lots,id_concours) VALUES("'.$_POST["nom_lots"].'","'.$_POST["description_lots"].'","'.$_POST["id_concours"].'")';
    $sql=$bdd->query($sql);
    $sql->closeCursor();
    $message='Informations envoyées';
    echo '<script type="text/javascript">window.alert("'.$message.'");</script>';
}
?>