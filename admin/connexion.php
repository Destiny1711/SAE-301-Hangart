<!DOCTYPE html>
    <html lang="fr">
    <head>         
        <meta http-equiv="content-type" content="text/html; charset=UTF-8" />
        <meta name="author" content="Dieste Sacha" />
        <meta name="description" content="Connexion Site" />
        <script src="animation.js"></script>
        <title>formulaire connexion admin</title>
    </head>

    <body>       
        <form method="POST" action="connexion.php" enctype="multipart/form-data">  

            <fieldset>

                <legend>Connexion</legend>

                <div class="formulaire" >

                    <p>
                        <label for="identifiant">identifiant</label>
                        <input type="text" name="identifiant" id="identifiant">
                    </p>

                    <p>
                        <label for="mdp">mot de passse</label>
                        <input type="text" name="mdp" id="mdp">
                    </p>

                    <p>
                        <input type="submit" name="soumettre" value="Soumettre" id="inscriptionInput">
                    </p>

                </div>
            </fieldset>

        </form>
    </body>
</html>

<?php
        //recuperation donnée lot
        if (isset($_POST['soumettre'])) {
            if($_POST['identifiant']=='identifiant'){
                if($_POST['mdp']=='motdepasse'){
                    include 'button.php';

                }
                else{
                    echo'le mot de passe est incorrect';
                }
            }
            else{
                echo'l\'identifiant est incorrect';
            }
        }
?>