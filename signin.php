<?php
    //connexion base de donnée
    //appel du fichier contenant les differents identifiants pour se connecter a la base de donnee
    include("parametre/parametre.php") ;
    //connexion a la base de donnee
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

    function Insert($nom_profil,$prenom_profil,$email_profil,$mdp_profil,$adresse_profil,$tel_profil){
        include("parametre/parametre.php") ;
        $bdd = new PDO('mysql:host='.$hote.';port='.$port.';dbname='.$nombase,$utilisateur,$mdp);
        $reqpreparee = $bdd->prepare("INSERT INTO profil(nom_profil,prenom_profil,email_profil,mdp_profil,adresse_profil,tel_profil) VALUES(:nom, :prenom, :mail, :password, :adress, :tel)");
        $reqpreparee->bindParam(':nom', $nom_profil, PDO::PARAM_STR);
        $reqpreparee->bindParam(':prenom', $prenom_profil, PDO::PARAM_STR);
        $reqpreparee->bindParam(':mail', $email_profil);
        $reqpreparee->bindParam(':password', $mdp_profil);
        $reqpreparee->bindParam(':adress', $adresse_profil);
        $reqpreparee->bindParam(':tel', $tel_profil);
        $reqpreparee->execute();
    // $sql='INSERT INTO participe(id_concours) VALUES("'.$_POST["id_concours"].'")';
    // echo $sql;
    // $sql=$bdd->query($sql);
    // $sql->closeCursor();
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="icon" type="images/x-icon" href="img/favicon.ico" />
  <link rel="stylesheet" type="text/css" href="css_bootstrap/bootstrap.min.css" />
  <link rel="stylesheet" type="text/css" href="css/design.css"/>
  <script src="https://code.jquery.com/jquery-2.1.4.min.js"></script>
  <script src="js_bootstrap/bootstrap.min.js"></script>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/Swiper/8.4.2/swiper-bundle.css">
  <link href="http://fonts.cdnfonts.com/css/montserrat" rel="stylesheet">
  <title>HANGART - SIGNIN</title>
</head>
<body>
    <div class="col-md-10 div_global_form">
        <form class="log_form" method="POST" enctype="multipart/form-data">  
            <div class="mb-3 img_log">
                <img src="img/logo_hangart.png" class="logo_log" alt="">
            </div>
            <div class="mb-3 div_form_signin">
                <label for="" class="form-label">Last Name</label>
                <input type="name" class="form-control" name="nom_profil" aria-describedby="emailHelp" required>
            </div>
            <div class="mb-3 div_form_signin">
                <label for="" class="form-label">First Name</label>
                <input type="name" name="prenom_profil" class="form-control" required>
            </div>
            <div class="mb-3 div_form_signin">
                <label for="" class="form-label">E-mail</label>
                <input type="email" name="email_profil" class="form-control" aria-describedby="emailHelp" required>
            </div>
            <div class="mb-3 div_form_signin">
                <label for="" class="form-label">Password</label>
                <input type="password" name="mdp_profil" class="form-control" required>
            </div>
            <div class="mb-3 div_form_signin">
                <label for="" class="form-label">Postal Adress</label>
                <input type="text" name="adresse_profil" class="form-control" required>
            </div>
            <div class="mb-3 div_form_signin">
                <label for="" class="form-label">Mobile</label>
                <input type="number" name="tel_profil" class="form-control" required>
            </div>
            <div class="mb-3 div_form_signin">
                <label for="id_concours">Giveway</label>
                <select name="id_concours">
                <?php
                    for($i=0; $i<$nbconcours; $i++){
                        echo '<option value="'.$tabconcours[$i]["id_concours"].'">'.$tabconcours[$i]["nom_concours"].'</option>';
                    }
                ?>
                </select>
            </div>
            <p>Have an account ? <a href="login.php">Login-in</a></p>
            <input type="submit" value="Send" class="btn">
            <?php 
                if (isset($_POST['email_profil'])){
                /** Execute une requete sql verifiant si le mail saisit existe dans la table*/
                $requete='SELECT * FROM profil WHERE email_profil="'.$_POST['email_profil'].'"';
                $resultats=$bdd->query($requete);
                $tabMail = $resultats->fetchAll();
                $resultats->closeCursor();
                $nbLine= count($tabMail);
                if ($nbLine==1) {
                    echo "Cette adresse mail est déjà utilisé";
                }
                /** Si le mail et le nom d'artiste n'existe pas alors le crée dans la table donc valider l'inscription*/
                if ($nbLine==0) {
                    $nom_profil=$_POST['nom_profil'];
                    $prenom_profil=$_POST['prenom_profil'];
                    $email_profil=$_POST['email_profil'];
                    $mdp_profil=md5($_POST['mdp_profil']);
                    $adresse_profil=$_POST['adresse_profil'];
                    $tel_profil=$_POST['tel_profil'];
                    Insert($nom_profil,$prenom_profil,$email_profil,$mdp_profil,$adresse_profil,$tel_profil);
                    header('Location: login.php');            
                }
                }
            ?>
        </form>
    </div>
</body>
</html>