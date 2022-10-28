<!--Page recap de concours-->

<?php
    //definition classe
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

    $requete='SELECT * FROM concours';
    $resultats = $bdd->query($requete) ;
    $tabconcours=$resultats->fetchAll() ;
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
        <title>recap concours</title>
    </head>

    <body>    
        <form action="formulaire_concours.php" method="get">
            <button type="submit">Ajouter concours</button>
        <!--Page menu de pour les éléments du concours-->
        </form>
        <?php
            for ($i=0; $i<$nbconcours ; $i++){
                $listconcours[$i]= new concours ($tabconcours[$i][1],$tabconcours[$i][2]);
                echo'
                    <form action="recap_concours.php" method="post">
                        <button type="submit" name="soumettre'.$i.'" value="Soumettre">supprimer</button>
                    </form>
                        <form action="modif_concours.php" method="get">
                        <button type="submit" name="renvoi" value="'.$i.'">modifier</button>
                    </form>
                ';
                if(isset($_POST['soumettre'.$i])){
                    $sql='DELETE from concours where id_concours='.$tabconcours[$i][0];
                    $sth = $bdd->prepare($sql);
                    $sth->execute();
                }
            }
        ?>
    </body>
</html>