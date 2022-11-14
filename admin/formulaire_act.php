<?php
    //appel du fichier contenant les differents identifiants pour se connecter a la base de donnee
    include("../parametre/parametre.php");
    include("recap_act.php") ;
    //connexion a la base de donnee
    session_start() ;
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
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
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
                                            } 
                                            else {
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
                                                    </ul>
                                                ';
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
    <div class="containerForm">
        <!--formulaire pour rentrer info sur activité-->
        <?php 
        echo'
        <form method="POST" action="annexe_act.php?id='.$_GET['id'].'" enctype="multipart/form-data">'; ?> 
            <div class="blocForm">
                <h2>INFORMATIONS ACTIVITÉ</h2>
                <div class="formulaire">
                    <div class="champs">
                        <label for="nom_act">Nom de l'activité</label>
                        <input class="input-group" type="text" name="nom_act" placeholder="ex : Graffiti">
                    </div>
                    <div class="champs">
                        <label for="date_act">Date de l'activité</label>
                        <input class="input-group" type="date" name="date_act" >
                    </div>
                    <div class="champs">
                        <label for="horaires_act">Horaires de l'activité</label>
                        <input class="input-group" type="time" name="horaires_act" >
                    </div>
                </div>
                <div class="upload">
                    <label for="image"></label>
                    <button type="button" class="btn-dl">
                        <input type="file" name="image">
                        <i class="fa fa-upload"></i> Ajouter une image 
                    </button>
                </div>
                <div class="envoyer">
		    <input class="btn1" type="reset" name="annuler" value="Annuler"> 
                    <input class="btn" type="submit" name="soumettre1" value="Ajouter">
                </div>
                <?php
                    $requete='SELECT * FROM activite';
                    $resultats = $bdd->query($requete) ;
                    $tabact=$resultats->fetchAll() ;
                    $resultats->closeCursor() ;
                    $nbact=count($tabact);
                    $listactivite=array();
                    for ($i=0; $i<$nbact ; $i++){
                        $listactivite[$i]= new activite ($tabact[$i][1],$tabact[$i][2],$tabact[$i][3]);
                        echo'
                            <div class="envoyer2">
                                <form action="annexe_act.php?id='.$_GET['id'].'&i='.$tabact[$i][0].'" method="POST">
                                    <input class="btn1" type="submit" name="soumettre" value="Supprimer">
                                </form>
                                <form action="modif_act.php?id='.$_GET['id'].'&i='.$tabact[$i][0].'" method="POST">
                                    <input class="btn" type="submit" value="Modifier">
                                </form>
                            </div>
                        ';
                    }
                ?>
            </div>
        </form>
        <div class="boutons">
            <?php 
                echo '
                    <a href="pagePasserelle.php?id='.$_GET['id'].'"">
                        <button>< Retour</button>
                    </a> 
                    <a href="formulaire_intervenant.php?id='.$_GET['id'].'"">
                        <button>Suivant ></button>
                    </a> 
                ';
            ?>
        </div> 
    </div>
    <?php include('../footer.php'); ?>
</body>
</html>
    