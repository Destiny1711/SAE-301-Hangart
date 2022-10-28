<!--Page de modification de activite-->

<?php
    class activite{
        public $nom = "";
        public $date = "";
        public $horaire = "";

        public function __construct($n,$d,$h){
            $this -> nom = $n;
            $this -> date = $d;
            $this -> horaire = $h;
            echo'<br>nom:'.$this->nom.' date:'.$this->date.'  horaire:'.$this->horaire;
        }

    }

    //connexion base de donnée
    //appel du fichier contenant les differents identifiants pour se connecter a la base de donnee
    include("parametre/parametre.php") ;

    //connexion a la base de donnee
    session_start() ;
    $bdd = new PDO('mysql:host='.$hote.';port='.$port.';dbname='.$nombase,$utilisateur,$mdp);


    $requete='SELECT * FROM activite where id_activite='.$_GET['renvoi'];
    $resultats = $bdd->query($requete) ;
    $tabactivite=$resultats->fetch() ;
    $resultats->closeCursor() ;
    $nbactivite=count($tabactivite);

    $listactivite=array();


?>

<!DOCTYPE html>
    <html lang="fr">
    <head>         
        <meta http-equiv="content-type" content="text/html; charset=UTF-8" />
        <meta name="author" content="Dieste Sacha" />
        <meta name="description" content="Connexion Site" />
        <title>modif activite</title>
    </head>

    <body>    
        <?php
            $id_activite=$_GET['renvoi'];
        ?>
        <form action="choix.php?id=<?php echo $tabactivite[$id_actvite] ?>" method="post">
            <p>
                <label for="nom_activite">Nom activite</label>
                <input type="text" name="nom_activite"  value='<?php echo $tabactivite['nom_activite'] ?>'>
            </p>

            <p>
                <label for="date_activite">Date activite</label>
                <input type="text" name="date_activite"  value='<?php echo $tabactivite['date_activite'] ?>'>
            </p>

            <button type="submit" name="soumettreconcours" value="Soumettre1">enregistrer</button>
        </form>
    </body>
</html>