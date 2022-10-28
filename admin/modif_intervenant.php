<!--Page de modification de intervenant-->

<?php
    class intervenant {
        public $nom = "";
        public $prenom = "";
        public $pays = "";
        public $bio = "";
        public $photo = "";

        public function __construct($n,$pr,$pays,$bio,$photo){
            $this -> nom = $n;
            $this -> prenom = $pr;
            $this -> pays = $pays;
            $this -> bio = $bio;
            $this -> photo = $photo;
            echo'<br>nom de l\'artiste:'.$this->nom.'  prenom de l\'artiste:'.$this->prenom.'  <br>nationalité:'.$this->pays.'  <br>biographie:'.$this->bio;
        }
    }

    //connexion base de donnée
    //appel du fichier contenant les differents identifiants pour se connecter a la base de donnee
    include("parametre/parametre.php") ;

    //connexion a la base de donnee
    session_start() ;
    $bdd = new PDO('mysql:host='.$hote.';port='.$port.';dbname='.$nombase,$utilisateur,$mdp);


    $requete='SELECT * FROM intervenants where id_intervenants='.$_GET['renvoi'];
    $resultats = $bdd->query($requete) ;
    $tabintervenants=$resultats->fetch() ;
    $resultats->closeCursor() ;
    $nbintervenants=count($tabintervenants);

    $listintrevenants=array();


?>

<!DOCTYPE html>
    <html lang="fr">
    <head>         
        <meta http-equiv="content-type" content="text/html; charset=UTF-8" />
        <meta name="author" content="Dieste Sacha" />
        <meta name="description" content="Connexion Site" />
        <title>recap intervenant</title>
    </head>

    <body>    
        <?php
            $id_intervenant=$_GET['renvoi'];
        ?>
        <form action="choix.php?id=<?php echo $tabintervenants[$id_intervenants] ?>" method="post">
            <p>
                <label for="nom_intervenants">Nom intervenant</label>
                <input type="text" name="nom_intervenants"  value='<?php echo $tabintervenants['nom_intervenant'] ?>'>
            </p>

            <p>
                <label for="prenom_intervenants">Prenom intervenant</label>
                <input type="text" name="prenom_intervenants"  value='<?php echo $tabintervenants['prenom_intervenant'] ?>'>
            </p>

            <button type="submit" name="soumettreconcours" value="Soumettre1">enregistrer</button>
        </form>
    </body>
</html>