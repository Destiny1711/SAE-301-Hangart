<?php

    //appel du fichier contenant les differents identifiants pour se connecter a la base de donnee
    include("parametre/parametre.php") ;

    //connexion a la base de donnee
    session_start() ;
    $bdd = new PDO('mysql:host='.$hote.';port='.$port.';dbname='.$nombase,$utilisateur,$mdp);

?>









<!--******************************************************************************-->
<!--formulaire pour rentrer info sur intervenant-->

    <form method="POST" action="index.php" enctype="multipart/form-data">  

    <fieldset>

        <legend>infos intervenant (infos intervenant)</legend>

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
                <label for="bio_inter">Bio intrevenant</label>
                <input type="text" name="bio_inter" >
            </p>

            <p>
                <label for="limage">L'image</label>
                <input type="file" name="limage" />(<i> *.jpg *.png</i>)
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
        $oeuvre=false;
        for($i=0;$i<count($tabOeuvres);$i++)
        {
            if($_POST['nom'] == $tabOeuvres[$i]['nom'])
            {
                $oeuvre=true;
            }
        }

        //si pas de correspondance ajout dans la base de donnee
        if ($oeuvre != true)
        {
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
                    else: 
                        echo "Pas de fichier joint";
                    endif;


        $sql='INSERT INTO intervenants(nom_intervenants,prenom_intervenants,pays_intervenants,bio_intervenants,image,id_intervenant,id_activite) VALUES("'.$_POST["nom_inter"].'","'.$_POST["prenom_inter"].'","'.$_POST["pays_inter"].'",'.$_POST["bio_inter"].','.$_POST["id_inter"].',"'.$get_the_file.'")';
        echo $sql;
        $sql=$bdd->query($sql);
        $sql->closeCursor();

    }

?>













<!--******************************************************************************-->
<!--formulaire pour rentrer info sur activité-->

<form method="POST" action="index.php" enctype="multipart/form-data">  

<fieldset>

    <legend>infos activité (infos activité)</legend>

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
            <label for="pays_inter">Horaires activités</label>
            <input type="text" name="pays_inter" >
        </p>

        <p>
            <label for="limage">L'image</label>
            <input type="file" name="limage" />(<i> *.jpg *.png</i>)
        </p>

        
    </div>
</fieldset>

</form>
<!--******************************************************************************-->

<?php
    //rentrée des données activités dans la bdd
    //recuperation donnée activite
    if (isset($_POST['soumettre'])) {

        $oeuvre=false;
        for($i=0;$i<count($tabOeuvres);$i++)
        {
            if($_POST['nom'] == $tabOeuvres[$i]['nom'])
            {
                $oeuvre=true;
            }
        }

        //si pas de correspondance ajout dans la base de donnee
        if ($oeuvre != true)
        {
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
                    else: 
                        echo "Pas de fichier joint";
                    endif;


        $sql='INSERT INTO activite(nom_activite,date_activite,horaires_activite,image,id_activite) VALUES("'.$_POST["nom_act"].'","'.$_POST["date_act"].'","'.$_POST["horaires_act"].'","'.$get_the_file.'","'.$_POST["id_act"].'")';
        echo $sql;
        $sql=$bdd->query($sql);
        $sql->closeCursor();



    }

    //recuperation donnée lot
    if (isset($_POST['soumettre'])) {
        $sql='INSERT INTO lots(nom_lots,description_lots,id_profil) VALUES("'.$_POST["nom_lots"].'","'.$_POST["description_lots"].'","'.$_POST["id_profil"].'")';
        echo $sql;
        $sql=$bdd->query($sql);
        $sql->closeCursor();
    }

?>










<!--******************************************************************************-->




<?php
    //recuperation donnée profil
    if (isset($_POST['SOUMETTRE'])){
        $sql='INSERT INTO profil(nom_profil,prenom_profil,email_profil,mdp_profil,adresse_profil,tel_profil,id_profil) VALUES("'.$_POST["nom_prof"].'","'.$_POST["prenom_prof"].'","'.$_POST["email_prof"].'",'.$_POST["mdp_prof"].'","'.$_POST["adresse_prof"].'","'.$_POST["tel_prof"].'","'.$_POST["id_prof"].'")';
        echo $sql;
        $sql=$bdd->query($sql);
        $sql->closeCursor();
    }

?>


<!--formulaire pour profil-->
    <form method="POST" action="index.php" enctype="multipart/form-data">  

    <fieldset>

        <legend>Entrez les informations suivantes (infos profils)</legend>

        <div class="formulaire" >

            <p>
                <label for="nom_profil">Nom</label>
                <input type="text" name="nom_profil" >
            </p>

            <p>
                <label for="prenom_profil">Prénom</label>
                <input type="text" name="prenom_profil" >
            </p>

            <p>
                <label for="email_profil">Adresse mail</label>
                <input type="text" name="email_profil" >
            </p>

            <p>
                <label for="mdp_profil">Mot de passe</label>
                <input type="text" name="mdp_profil" >
            </p>

            <p>
                <label for="adresse_profil">Adresse profil</label>
                <input type="text" name="adresse_profil" >
            </p>

            <p>
                <label for="tel_profil">Mot de passe</label>
                <input type="text" name="tel_profil" >
            </p>

            <p>
                <input type="submit" name="soumettre1" value="Soumettre">
                <input type="reset" value="annuler" name="annuler">
            </p>

            
            
        </div>
    </fieldset>

    </form>
