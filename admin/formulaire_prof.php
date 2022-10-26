<?php
    //connexion base de donnée
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
        <title>formulaire profil</title>
    </head>

    <body>

        <?php
        //recuperation donnée profil
        if (isset($_POST['SOUMETTRE'])){
            $sql='INSERT INTO profil(nom_profil,prenom_profil,email_profil,mdp_profil,adresse_profil,tel_profil) VALUES("'.$_POST["nom_profil"].'","'.$_POST["prenom_profil"].'","'.$_POST["email_profil"].'","'.$_POST["mdp_profil"].'","'.$_POST["adresse_profil"].'","'.$_POST["tel_profil"].'")';
            echo $sql;
            $sql=$bdd->query($sql);
            $sql->closeCursor();

            $sql='INSERT INTO participe(id_concours) VALUES("'.$_POST["id_concours"].'")';
            echo $sql;
            $sql=$bdd->query($sql);
            $sql->closeCursor();
        }
        ?>

        <!--formulaire pour profil-->
        <form method="POST" action="formulaire_prof.php" enctype="multipart/form-data">  

            <fieldset>

                <legend>inscription concours</legend>

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
                        <label for="tel_profil">telephone</label>
                        <input type="text" name="tel_profil" >
                    </p>

                    <p>
                        <label for="id_concours">concours</label>
                        <select name="id_concours">
                        <?php
                            for($i=0; $i<$nbconcours; $i++){
                                echo '<option value="'.$tabconcours[$i]["id_concours"].'">'.$tabconcours[$i]["nom_concours"].'</option>';
                            }
                        ?>
                        </select>
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
    