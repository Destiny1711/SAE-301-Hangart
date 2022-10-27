<?php
    //appel du fichier contenant les differents identifiants pour se connecter a la base de donnee
    include("parametre/parametre.php") ;
    //connexion a la base de donnee
    session_start() ;
    $bdd = new PDO('mysql:host='.$hote.';port='.$port.';dbname='.$nombase,$utilisateur,$mdp);
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
            <!--formulaire pour rentrer info sur activité-->
            <form method="POST" action="formulaire_act.php" enctype="multipart/form-data"> 
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
                        <input class="btn1" type="submit" name="soumettre1" value="Envoyer">
                        <input class="btn1" type="reset" name="annuler" value="Annuler"> 
                    </div>
                </div>
            </form>
            <div class="boutons">
                <a class="btn3" href="formulaire_lot.php">
                    <button>< Retour</button>
                </a> 
                <a class="btn2" href="formulaire_intervenant.php">
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
//rentrée des données activités dans la bdd
if (isset($_POST['soumettre1'])) {
        //enregistrement des données d'une activite dans la base de données
            //enregistrement de l'image lié à l'activite
            // taille autorisées (min & max -- en octets)
            $file_min_size = 0;
            $file_max_size = 10000000;
            // On vérifie la présence d"un fichier à uploader
            if (($_FILES["image"]["size"] > $file_min_size) && ($_FILES["image"]["size"] < $file_max_size)) :
                // dossier où sera déplacé le fichier; ce dossier doit exister
                $content_dir = "img/img_act";
                $tmp_file = $_FILES["image"]["tmp_name"];
                if( !is_uploaded_file($tmp_file) ){
                    echo "Fichier non trouvé";
                }
                // on vérifie l"extension
                $path = $_FILES["image"]["name"];
                $ext = pathinfo($path, PATHINFO_EXTENSION); // on récupère l"extension
                if(!strstr($ext, "jpg")&& !strstr($ext, "png")&& !strstr($ext, "jpeg")){
                    echo "EXTENSION ".$ext." NON AUTORISEE";
                }
                // Si le formulaire est validé, on copie le fichier dans le dossier de destination
                if(empty($errors)){
                    $name_file = md5(uniqid(rand(), true)).".".$ext; // on crée un nom unique en conservant l"extension
                    if( !move_uploaded_file($tmp_file, $content_dir . $name_file) ){
                        echo "Il y a des erreurs! Impossible de copier le fichier dans le dossier cible";
                    }
                } 
                // On récupère l"url du fichier envoyé
                $get_the_file = $content_dir.$name_file;
                elseif($_FILES["upfiles"]["size"] > $file_max_size):
                    echo "Le fichier dépasse la limite autorisée";
                else:
                    echo "Pas de fichier joint";
                endif;
//recuperation des données d'activité
    $sql='INSERT INTO activite(nom_activite,date_activite,horaires_activite,img_activite) VALUES("'.$_POST["nom_act"].'","'.$_POST["date_act"].'","'.$_POST["horaires_act"].'","'.$get_the_file.'")';
    $sql=$bdd->query($sql);
    $sql->closeCursor();
    $message='Informations envoyées';
    echo '<script type="text/javascript">window.alert("'.$message.'");</script>';
}
?>
    
    