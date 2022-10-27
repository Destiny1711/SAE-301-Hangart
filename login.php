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
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="css_bootstrap/bootstrap.min.css" />
    <link rel="stylesheet" type="text/css" href="design.css"/>
    
    <script src="https://code.jquery.com/jquery-2.1.4.min.js"></script>
    <script src="js_bootstrap/bootstrap.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/Swiper/8.4.2/swiper-bundle.css">
    <link href="http://fonts.cdnfonts.com/css/montserrat" rel="stylesheet">
    <title>Log In</title>
</head>
<body>
    <div class="col-md-10 div_global_form">
        <form class="log_form">
            <div class="mb-3 img_log">
                <img src="img/logo_hangart.png" class="logo_log" alt="">
            </div>
            <div class="mb-3 div_form">
            <label for="" class="form-label">Adresse Mail</label>
            <input type="email" class="form-control" aria-describedby="emailHelp">
            
            </div>
            <div class="mb-3 div_form">
            <label for="" class="form-label">Mot de Passe</label>
            <input type="password" class="form-control">
            </div>
            <p>Vous n'avez pas de compte ? <a href="signin.php">Créez un compte</a></p>
            <button type="submit" class="btn btn-primary">Envoyer</button>
        </form>
    </div>
    <?php

      /** Verifie que les champs ne sont pas vides**/

      if (isset($_POST['mail']) && isset($_POST['password'])){

        $requete='SELECT * FROM user WHERE mail="'.$_POST['mail'].'"';
        $resultats=$connection->query($requete);
        $tabUser = $resultats->fetchAll();
        $resultats->closeCursor();
        $nbMail = count($tabUser);
        if ($nbMail==0){
          echo "L'email saisit est incorrect";
        }

        /** Execute une requete sql verifiant si le mail saisit existe dans la table*/

        $requete='SELECT * FROM user WHERE password="'.$_POST['password'].'"';
        $resultats=$connection->query($requete);
        $tabUser = $resultats->fetchAll();
        $resultats->closeCursor();
        $nbPassword = count($tabUser);
        if ($nbPassword==0) {
          echo "Le mot de passe est incorrect";
        }
      }

      ?>

    <script src="https://cdn.jsdelivr.net/npm/swiper/swiper-bundle.min.js"></script>
</body>
</html>