<?php
    //rentrée des données des intervenants dans la bdd
    //verification si il y a une correspondance dans la base de donnee
    include("../parametre/parametre.php");
    $bdd = new PDO('mysql:host='.$hote.';port='.$port.';dbname='.$nombase,$utilisateur,$mdp);
    $requete='SELECT * FROM intervenants';
    $resultats = $bdd->query($requete);
    $tabintervenant=$resultats->fetchAll();
    $resultats->closeCursor();
    $nbintervenant=count($tabintervenant);
    //recuperation donnée intervenants
    if (isset($_POST['soumettre2'])) {
    //enregistrement des données d'un intervenant dans la base de données
    //enregistrement de l'image lié à l'intervenant
        // taille autorisées (min & max -- en octets)
        $file_min_size = 0;
        $file_max_size = 10000000;
        // On vérifie la présence d"un fichier à uploader
        if (($_FILES["image"]["size"] > $file_min_size) && ($_FILES["image"]["size"] < $file_max_size)) :
            // dossier où sera déplacé le fichier; ce dossier doit exister
            $content_dir = "img/img_inter";
            $tmp_file = $_FILES["image"]["tmp_name"];
            if( !is_uploaded_file($tmp_file) ){
                echo "Fichier non trouvé";
            }
            // on vérifie l"extension
            $path = $_FILES["image"]["name"];
            $ext = pathinfo($path, PATHINFO_EXTENSION); // on récupère l"extension
            if(!strstr($ext, "jpg")&& !strstr($ext, "png")&& !strstr($ext, "jpeg")&& !strstr($ext, "webp")){
                echo "EXTENSION ".$ext." NON AUTORISEE";
            }
            // Si le formulaire est validé, on copie le fichier dans le dossier de destination
            if(empty($errors)){
                $name_file = md5(uniqid(rand(), true)).".".$ext; // on crée un nom unique en conservant l"extension
                if( !move_uploaded_file($tmp_file, $content_dir . $name_file)){
                    echo "Il y a des erreurs! Impossible de copier le fichier dans le dossier cible";
                }
            } 
            // On récupère l"url du fichier envoyé
            $get_the_file = $content_dir.$name_file;
            elseif($_FILES["upfiles"]["size"] > $file_max_size):
                echo "le fichier dépasse la limite autorisée";
            else :
                echo "Pas de fichier joint";
            endif;   
        $sql='INSERT INTO intervenants(nom_intervenants,prenom_intervenants,pays_intervenants,id_activite,bio_intervenants,img_intervenants) VALUES("'.$_POST["nom_inter"].'","'.$_POST["prenom_inter"].'","'.$_POST["pays_inter"].'","'.$_POST["id_act"].'","'.$_POST["bio_inter"].'","'.$get_the_file.'")';
        $sql=$bdd->query($sql);
        $sql->closeCursor(); 
    }
    if(isset($_GET['i'])){
        $i=$_GET['i'];          
        $sql='DELETE FROM intervenants WHERE id_intervenants='.$i;
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
    <link rel="stylesheet" type="text/css" href="../css/design.css"/>
    <link href="http://fonts.cdnfonts.com/css/montserrat" rel="stylesheet">
    <title>HANGART - Admin</title>
</head>
<body class="body_compte">
    <div class="div_global_form">
        <div class="log_form" method="POST" enctype="multipart/form-data">  
            <h2>VEUILLEZ CONFIRMER</h2>
            <div class="line"></div>
            <div style="width:100%; margin-bottom:2vw; text-align:center;">En cliquant sur "confirmer", vous allez modifier la base de donnée.</div>
            <?php
                echo'
                    <form action="formulaire_intervenant.php?id='.$_GET['id'].'" method="POST">
                        <input class="btn1" type="submit" value="Envoyer">
                    </form>
                ';
            ?>
        </div>
    </div>
</body>
</html>