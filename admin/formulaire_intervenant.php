<?php

    //appel du fichier contenant les differents identifiants pour se connecter a la base de donnee
    include("parametre/parametre.php") ;

    //connexion a la base de donnee
    session_start() ;
    $bdd = new PDO('mysql:host='.$hote.';port='.$port.';dbname='.$nombase,$utilisateur,$mdp);

    $requete='SELECT * FROM activite';
    $resultats = $bdd->query($requete) ;
    $tabAct=$resultats->fetchAll() ;
    $resultats->closeCursor() ;

    $nbAct=count($tabAct);

?>


<!DOCTYPE html>
    <html lang="fr">
    <head>         
        <meta http-equiv="content-type" content="text/html; charset=UTF-8" />
        <meta name="author" content="Dieste Sacha" />
        <meta name="description" content="Connexion Site" />
        <title>formulaire intervenant</title>
    </head>

    <body>
        <!--******************************************************************************-->
        <!--formulaire pour rentrer info sur intervenant-->

        <form method="POST" action="index.php" enctype="multipart/form-data">  

        <fieldset>

            <legend>Infos intervenant</legend>

            <div class="formulaire" >

                <p>
                    <label for="nom_inter">Nom intervenant</label>
                    <input type="text" name="nom_inter" >
                </p>

                <p>
                    <label for="prenom_inter">Prénom intervenant</label>
                    <input type="text" name="prenom_inter" >
                </p>

                <p>
                    <label for="pays_inter">Pays intervenant</label>
                    <input type="text" name="pays_inter" >
                </p>

                <p>
                    <label for="id_act">activité</label>
                    <select name="id_act">
                    <?php
                        for($i=0; $i<$nbAct; $i++){
                            echo '<option value="'.$tabAct[$i]["id_activite"].'">'.$tabAct[$i]["nom_activite"].'</option>';
                        }
                    ?>
                    </select>
                </p>

                <p>
                    <label for="bio_inter">Bio intervenant</label>
                    <input type="text" name="bio_inter" >
                </p>

                <p>
                    <label for="limage">L'image</label>
                    <input type="file" name="limage" />(<i> *.jpg *.png</i>)
                </p>

                <p>
                    <input type="submit" name="soumettre" value="Soumettre">
                    <input type="reset" value="annuler" name="annuler">
                </p>
                
            </div>
        </fieldset>

        </form>
        <!--******************************************************************************-->

        <?php


        //rentrée des données intervenants dans la bdd
        //verification si il y a une correspondance dans la base de donnee
        $requete='SELECT * FROM intervenants';
        $resultats = $bdd->query($requete) ;
        $tabinter=$resultats->fetchAll() ;
        $resultats->closeCursor() ;

        //recuperation donnée intervenants
        if (isset($_POST['soumettre'])) {

                //enregistrement des données d'un intervenant dans la base de données
                

                    //enregistrement de l'image lié à l'intervenant

                    // taille autorisées (min & max -- en octets)
                    $file_min_size = 0;
                    $file_max_size = 10000000;
                    // On vérifie la présence d"un fichier à uploader
                    if (($_FILES["limage"]["size"] > $file_min_size) && ($_FILES["limage"]["size"] < $file_max_size)) :
                        // dossier où sera déplacé le fichier; ce dossier doit exister
                        $content_dir = "img/img_inter";
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
                        else :
                            echo "Pas de fichier joint";
                        endif;

            
            $sql='INSERT INTO intervenants(nom_intervenants,prenom_intervenants,pays_intervenants,id_activite,bio_intervenants,img_intervenants) VALUES("'.$_POST["nom_inter"].'","'.$_POST["prenom_inter"].'","'.$_POST["pays_inter"].'","'.$_POST["id_act"].'","'.$_POST["bio_inter"].'","'.$get_the_file.'")';
            echo $sql;
            $sql=$bdd->query($sql);
            $sql->closeCursor();

        }

        ?>

    </body>

    </html>
    