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
        <title>formulaire profil</title>
    </head>

    <body>

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
                    <input type="submit" name="SOUMETTRE" value="Soumettre">
                    <input type="reset" value="annuler" name="annuler">
                </p>

                
            </div>
        </fieldset>

        </form>
    </body>

    </html>
    