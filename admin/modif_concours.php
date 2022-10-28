<!--Page de modification de concours-->

<?php
    class concours{
        public $nom = "";
        public $horaire = "";

        public function __construct($n, $h){
            $this -> nom = $n;
            $this -> horaire = $h;
            echo'<br>nom:'.$this->nom.'  horaire:'.$this->horaire;
        }
    }

    //connexion base de donnée
    //appel du fichier contenant les differents identifiants pour se connecter a la base de donnee
    include("parametre/parametre.php") ;

    //connexion a la base de donnee
    session_start() ;
    $bdd = new PDO('mysql:host='.$hote.';port='.$port.';dbname='.$nombase,$utilisateur,$mdp);


    $requete='SELECT * FROM concours where id_concours='.$_GET['renvoi'];
    $resultats = $bdd->query($requete) ;
    $tabconcours=$resultats->fetch() ;
    $resultats->closeCursor() ;
    $nbconcours=count($tabconcours);

    $listconcours=array();


?>

<!DOCTYPE html>
    <html lang="fr">
    <head>         
        <meta http-equiv="content-type" content="text/html; charset=UTF-8" />
        <meta name="author" content="Dieste Sacha" />
        <meta name="description" content="Connexion Site" />
        <title>recap lots</title>
    </head>

    <body>    
        <?php
            $id_concours=$_GET['renvoi'];
        ?>
        <form action="choix.php?id=<?php echo $tabconcours[$id_concours] ?>" method="post">
            <p>
                <label for="nom_lots">Nom concours</label>
                <input type="text" name="nom_concours"  value='<?php echo $tabconcours['nom_concours'] ?>'>
            </p>
            <p>
                <label for="desc_concours">Description concours</label>
                <input type="text" name="desc_concours" value='<?php echo $tabconcours['description_concours'] ?>'>
            </p>

            <button type="submit" name="soumettreconcours" value="Soumettre1">enregistrer</button>
        </form>
    </body>
</html>