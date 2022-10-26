<?php
    //connexion base de donnée
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
        <title>parametre concours</title>
    </head>

    <body>       
        <!--**************************************************************************-->
        <!--formulaire pour rentrer info sur activité-->
        <form method="POST" action="formulaire_choix.php" enctype="multipart/form-data">  
            <fieldset>
            <legend>infos concours</legend>
                <div class="formulaire" >

                    <p>
                        <label for="nom_concours">Nom concours</label>
                        <input type="text" name="nom_concours" >
                    </p>

                    <p>
                        <label for="date_concours">Date concours</label>
                        <input type="text" name="date_concours" >
                    </p>

                    <p>
                        <input type="submit" name="soumettre" value="Soumettre">
                        <input type="reset" value="annuler" name="annuler">
                    </p>
                </div>
            </fieldset>
        </form>
        <!--**********************************************************************-->

        <?php
            //recuperation donnée lot
            if (isset($_POST['soumettre'])) {
                $sql='INSERT INTO concours(nom_concours,horaires_concours) VALUES("'.$_POST["nom_concours"].'","'.$_POST["date_concours"].'")';
                echo $sql;
                $sql=$bdd->query($sql);
                $sql->closeCursor();
            }
        ?>

    </body>
</html>