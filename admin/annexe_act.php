<?php
    //rentrée des données des intervenants dans la bdd
    //verification si il y a une correspondance dans la base de donnee
    include("../parametre/parametre.php");
    $bdd = new PDO('mysql:host='.$hote.';port='.$port.';dbname='.$nombase,$utilisateur,$mdp);
    $requete='SELECT * FROM activite';
    $resultats = $bdd->query($requete);
    $tabact=$resultats->fetchAll();
    $resultats->closeCursor();
    $nbact=count($tabact);
    //recuperation donnée intervenants
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
            if(!is_uploaded_file($tmp_file) ){
                echo "Fichier non trouvé";
            }
            // on vérifie l"extension
            $path = $_FILES["image"]["name"];
            $ext = pathinfo($path, PATHINFO_EXTENSION); // on récupère l"extension
            if( !strstr($ext, "jpg")&& !strstr($ext, "png")&& !strstr($ext, "jpeg")){
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
    }
    if(isset($_GET['i'])){
        $i=$_GET['i'];          
        $sql='DELETE FROM activite WHERE id_activite='.$i;
        $sth = $bdd->prepare($sql);
        $sth->execute();
    }
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
  <link href="http://fonts.cdnfonts.com/css/montserrat" rel="stylesheet">
  <title>HANGART - ADMIN</title>
</head>
<body class="body_compte">
    <div class="div_global_form">
        <div class="log_form" method="POST" enctype="multipart/form-data">  
            <h2>VEUILLEZ CONFIRMER</h2>
            <div class="line"></div>
            <div style="width:100%; margin-bottom:2vw; text-align:center;">En cliquant sur "confirmer", vous allez modifier la base de donnée.</div>
            <?php
                echo'
                    <form action="formulaire_act.php?id='.$_GET['id'].'" method="POST">
                        <input class="btn2" type="submit" value="Confirmer">
                    </form>
                ';
            ?>
        </div>
    </div>
</body>
</html>