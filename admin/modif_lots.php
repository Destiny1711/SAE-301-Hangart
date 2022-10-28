<!--Page de modification de lot-->

<?php
    class lots{
        public $nom = "";
        public $desc = "";

        public function __construct($nom, $d){
            $this -> nom = $nom;
            $this -> desc = $d;
            echo'<br>nom:'.$this->nom.'  description:'.$this->desc;
        }
    }

    //connexion base de donnée
    //appel du fichier contenant les differents identifiants pour se connecter a la base de donnee
    include("parametre/parametre.php") ;

    //connexion a la base de donnee
    session_start() ;
    $bdd = new PDO('mysql:host='.$hote.';port='.$port.';dbname='.$nombase,$utilisateur,$mdp);


    $requete='SELECT * FROM lots where id_lots='.$_GET['renvoi'];
    $resultats = $bdd->query($requete) ;
    $tablots=$resultats->fetch() ;
    $resultats->closeCursor() ;
    $nblots=count($tablots);

    $listlots=array();


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
            $id_lots=$_GET['renvoi'];
        ?>
        <form action="choix.php?id=<?php echo $tablots[$id_lots] ?>" method="post">
            <p>
                <label for="nom_lots">Nom lots</label>
                <input type="text" name="nom_lots"  value='<?php echo $tablots['nom_lots'] ?>'>
            </p>
            <p>
                <label for="desc_lots">Description lots</label>
                <input type="text" name="desc_lots" value='<?php echo $tablots['description_lots'] ?>'>
            </p>

            <button type="submit" name="soumettrelots1" value="Soumettre1">enregistrer</button>
        </form>


    </body>
</html>