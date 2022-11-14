<?php 
    include("../parametre/parametre.php");
    //connexion a la base de donnee
    $bdd = new PDO('mysql:host='.$hote.';port='.$port.';dbname='.$nombase,$utilisateur,$mdp);
?>

<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="icon" type="images/x-icon" href="img/favicon.ico" />
  <link rel="stylesheet" type="text/css" href="../css_bootstrap/bootstrap.min.css" />
  <link rel="stylesheet" type="text/css" href="../css/design.css"/>
  <link href="http://fonts.cdnfonts.com/css/montserrat" rel="stylesheet">
  <title>HANGART - Admin</title>
</head>
<body>
    <header>
        <div class="container-fluid">
            <div class="row">
                <div class="col-md navigation">
                    <div class="divLogo">
                    <?php
                        if(isset($_GET['id'])){
                            echo'
                            <a href="../index.php?id='.$_GET['id'].'"><img class="logo" id="logo" src="img/logo_hangart.png" alt="Logo Hangart"></a>';
                        } 
                        else { 
                            echo'
                            <a href="../index.php"><img class="logo" id="logo" src="img/logo_hangart.png" alt="Logo Hangart"></a>';
                        }
                    ?>
                    </div>
                    <ul class="menu">
                        <?php 
                            echo'
                                <li><a href="../index.php?id='.$_GET['id'].'#accueil">Accueil</a></li>
                                <li><a href="../index.php?id='.$_GET['id'].'#programme">Programme</a></li>
                                <li><a href="../index.php?id='.$_GET['id'].'#lieu">Lieu & Horaires</a></li>
                                <li><a href="../index.php?id='.$_GET['id'].'#concours">Concours</a></li>
                                <li><a href="../index.php?id='.$_GET['id'].'#contact">Contact</a></li>
                            ';
                        ?>
                    </ul>
                    <div class="profil">
                        <div class="account">
                            <img class="icon_connect" src="img/profil.png" alt="Icône Profil">
                            <div class="compte">
                                <ul class="profil_list">
                                    <li>
                                        <?php 
                                            if(!isset($_GET['id'])){
                                                echo '<a class="text_profil" href="../login.php">Se connecter</a>';
                                            } else {
                                                echo '<a class="text_profil" href="#">Profil</a>
                                                <ul>';
                                                    $requete='SELECT * FROM profil WHERE id_profil="1"';
                                                    $resultats=$bdd->query($requete);
                                                    $tabAdmin = $resultats->fetchAll();
                                                    $resultats->closeCursor();
                                                    if($_GET['id']==$tabAdmin[0]['id_profil']){
                                                        echo '<li><a href="pagePasserelle.php?id='.$_GET['id'].'" class="text_profil">Admin</a></li>';
                                                    }
                                                        echo '<li><a href="../compte.php?id='.$_GET['id'].'" class="text_profil">Compte</a></li>
                                                        <li><a href="../index.php" class="text_profil">Se déconnecter</a></li>
                                                </ul>';
                                            }
                                        ?>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </header>
    <div class="div_global_form">
        <form class="log_form" method="POST" enctype="multipart/form-data">  
            <h2>MODIFIER LE CONCOURS</h2>
            <div class="line"></div>
            <div style="width:100%; margin-bottom:2vw; text-align:center;">Attention : Toutes les informations saisit sont toutes de nouvelles valeurs</div>
            <div class="mb-3 div_form_signin">
                <label for="" class="form-label">Nom</label>
                <input type="name" class="form-control" name="nom_concours" aria-describedby="emailHelp">
            </div>
            <div class="mb-3 div_form_signin">
                <label for="" class="form-label">Horaires</label>
                <input type="time" name="horaires_concours" class="form-control">
            </div>
            <div class="mb-3 div_form_signin max">
                <label for="" class="form-label">Date</label>
                <input type="date" name="date_concours" class="form-control" aria-describedby="emailHelp">              
            </div>
            <input class="btn2" type="submit" name="btn" value="Envoyer">
            <?php 
                if (isset($_POST['btn'])){
                /** Execute une requete sql verifiant si le mail saisit existe dans la table*/
                $requete='UPDATE concours SET 
                nom_concours="'.$_POST['nom_concours'].'", 
                horaires_concours="'.$_POST['horaires_concours'].'",
                date_concours="'.$_POST['date_concours'].'"
                WHERE id_concours="'.$_GET['id_concours'].'"';
                $resultats=$bdd->query($requete);
                }
            ?>
        </form>
    </div>
    <?php include('../footer.php'); ?>
</body>
</html>