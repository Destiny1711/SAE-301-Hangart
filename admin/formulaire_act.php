<?php
    //appel du fichier contenant les differents identifiants pour se connecter a la base de donnee
    include("parametre/parametre.php") ;

    //connexion a la base de donnee
    session_start() ;
    $bdd = new PDO('mysql:host='.$hote.';port='.$port.';dbname='.$nombase,$utilisateur,$mdp);

?>

<!DOCTYPE html>
    <html lang="fr">
    <head>         
        <meta http-equiv="content-type" content="text/html; charset=UTF-8" />
        <meta name="author" content="Dieste Sacha" />
        <meta name="description" content="Connexion Site" />
        <title>formulaire activite</title>
    </head>

    <body>

        <!--******************************************************************************-->
        <!--formulaire pour rentrer info sur activité-->

        <form method="POST" action="formulaire_act.php" enctype="multipart/form-data">  

        <fieldset>

        <legend>Infos activité</legend>

        <div class="formulaire" >

            <p>
                <label for="nom_act">Nom activité</label>
                <input type="text" name="nom_act" >
            </p>

            <p>
                <label for="date_act">Date activité</label>
                <input type="text" name="date_act" >
            </p>

            <p>
                <label for="horaires_act">Horaires activités</label>
                <input type="text" name="horaires_act" >
            </p>

            <p>
                <label for="limage">L'image</label>
                <input type="file" name="limage" />(<i> *.jpg *.png</i>)
            </p>
            
            <p>
                <input type="submit" name="soumettre0" value="Soumettre">
                <input type="reset" value="annuler" name="annuler">
            </p>

        </div>
        </fieldset>

        </form>
        <!--******************************************************************************-->

        <?php
        //rentrée des données activités dans la bdd
        //recuperation donnée activite
        if (isset($_POST['soumettre0'])) {


                //enregistrement des données d'une activite dans la base de données
                

                    //enregistrement de l'image lié à l'activite

                    // taille autorisées (min & max -- en octets)
                    $file_min_size = 0;
                    $file_max_size = 10000000;
                    // On vérifie la présence d"un fichier à uploader
                    if (($_FILES["limage"]["size"] > $file_min_size) && ($_FILES["limage"]["size"] < $file_max_size)) :
                        // dossier où sera déplacé le fichier; ce dossier doit exister
                        $content_dir = "img/img_act";
                        $tmp_file = $_FILES["limage"]["tmp_name"];
                        if( !is_uploaded_file($tmp_file) ){
                            echo "Fichier non trouvé";
                        }
                        // on vérifie l"extension
                        $path = $_FILES["limage"]["name"];
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
                        echo "image enregistrée avec chemin =".$get_the_file;
                        
                        elseif($_FILES["upfiles"]["size"] > $file_max_size):
                            echo "le fichier dépasse la limite autorisée";
                        else
                            echo "Pas de fichier joint";
                        endif;
          

            $sql='INSERT INTO activite(nom_activite,date_activite,horaires_activite,img_activite) VALUES("'.$_POST["nom_act"].'","'.$_POST["date_act"].'","'.$_POST["horaires_act"].'","'.$get_the_file.'")';
            echo $sql;
            $sql=$bdd->query($sql);
            $sql->closeCursor();

        }
        ?>
      
    </body>

    </html>
    