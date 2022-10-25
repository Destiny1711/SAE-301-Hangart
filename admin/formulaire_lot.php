<?php
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

?>


<!DOCTYPE html>
    <html lang="fr">
    <head>         
        <meta http-equiv="content-type" content="text/html; charset=UTF-8" />
        <meta name="author" content="Dieste Sacha" />
        <meta name="description" content="Connexion Site" />
        <title>formulaire lot</title>
    </head>

    <body>       
        <!--**************************************************************************-->
        <!--formulaire pour rentrer info sur activité-->

        <form method="POST" action="formulaire_lot.php" enctype="multipart/form-data">  

        <fieldset>

        <legend>infos lots</legend>

        <div class="formulaire" >

            <p>
                <label for="nom_lots">Nom lots</label>
                <input type="text" name="nom_lots" >
            </p>

            <p>
                <label for="desc_lots">Description lots</label>
                <input type="text" name="desc_lots" >
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
                <input type="submit" name="soumettre0" value="Soumettre">
                <input type="reset" value="annuler" name="annuler">
            </p>

        </div>
        </fieldset>

        </form>
        <!--**********************************************************************-->

        <?php
            //recuperation donnée lot
            if (isset($_POST['soumettre0'])) {
                $sql='INSERT INTO lots(nom_lots,description_lots,id_concours) VALUES("'.$_POST["nom_lots"].'","'.$_POST["description_lots"].'","'.$_POST["id_concours"].'")';
                echo $sql;
                $sql=$bdd->query($sql);
                $sql->closeCursor();
            }

        ?>

    </body>

    </html>
    