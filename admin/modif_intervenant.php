<?php 
    include("../parametre/parametre.php");
    //connexion a la base de donnee
    $bdd = new PDO('mysql:host='.$hote.';port='.$port.';dbname='.$nombase,$utilisateur,$mdp);
?>

<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="icon" type="images/x-icon" href="img/favicon.ico" />
  <link rel="stylesheet" type="text/css" href="../css_bootstrap/bootstrap.min.css" />
  <link rel="stylesheet" type="text/css" href="../css/design.css"/>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <link href="http://fonts.cdnfonts.com/css/montserrat" rel="stylesheet">
  <title>HANGART - Admin</title>
</head>
<body class="body_compte">
    <div class="div_global_form">
        <form class="log_form" method="POST" enctype="multipart/form-data">  
            <h2>MODIFIER L'INTERVENANT</h2>
            <div class="line"></div>
            <div style="width:100%; margin-bottom:2vw; text-align:center;">Attention : Toutes les informations saisit sont toutes de nouvelles valeurs</div>
            <div class="mb-3 div_form_signin">
                <label for="" class="form-label">Nom</label>
                <input type="name" class="form-control" name="nom_profil" aria-describedby="emailHelp" required>
            </div>
            <div class="mb-3 div_form_signin">
                <label for="" class="form-label">Prénom</label>
                <input type="name" name="prenom_profil" class="form-control" required>
            </div>
            <div class="mb-3 div_form_signin max">
                <label for="" class="form-label">Pays</label>
                <input type="text" name="email_profil" class="form-control" aria-describedby="emailHelp" required>     
            </div>
            <div class="mb-3 div_form_signin max">
                <label for="" class="form-label">Biographie</label>
                <textarea name="mdp_profil" class="form-control" required></textarea>
            </div>
            <div class="mb-3 div_form_signin max">
                <label for="image"></label>
                <button type="button" class="btn-dl">
                    <input type="file" name="image">
                    <i class="fa fa-upload"></i> Ajouter une image 
                </button>
            </div>
            <input class="btn2" type="submit" name="btn" value="Envoyer">
            <?php
                echo'
                    <form action="formulaire_intervenant.php?id='.$_GET['id'].'" method="POST">
                        <input class="btn2" type="submit" value="Retourner sur la page précédente">
                    </form>
                ';
            ?>
            <?php 
                if (isset($_POST['btn'])){
                /** Execute une requete sql verifiant si le mail saisit existe dans la table*/
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
                            echo "le fichier dépasse la limite autorisée";
                        else :
                            echo "Pas de fichier joint";
                        endif;   
                    $requete='UPDATE intervenants SET 
                    nom_intervenants="'.$_POST['nom_profil'].'", 
                    prenom_intervenants="'.$_POST['prenom_profil'].'",
                    pays_intervenants="'.$_POST['email_profil'].'",
                    bio_intervenants="'.$_POST['mdp_profil'].'",
                    img_intervenants="'.$get_the_file.'"
                    WHERE id_intervenants="'.$_GET['id_intervenant'].'"';
                    $resultats=$bdd->query($requete);
                }
            ?>
        </form>
    </div>
</body>
</html>