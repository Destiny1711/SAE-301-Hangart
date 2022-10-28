<!--Page racap de activite-->

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


    $requete='SELECT * FROM activite';
    $resultats = $bdd->query($requete) ;
    $tabAct=$resultats->fetchAll() ;
    $resultats->closeCursor() ;
    $nbact=count($tabAct);

    $listactivite=array();
?>

<!DOCTYPE html>
    <html lang="fr">
    <head>         
        <meta http-equiv="content-type" content="text/html; charset=UTF-8" />
        <meta name="author" content="Dieste Sacha" />
        <meta name="description" content="Connexion Site" />
        <title>recap act</title>
    </head>

    <body>
        <form action="formulaire_act.php" method="get">
            <button type="submit">Ajouter activité</button>
        </form>
        <?php
            for ($i=0; $i<$nbact ; $i++){
                $listactivite[$i]= new activite ($tabAct[$i][1],$tabAct[$i][2],$tabAct[$i][3]);
                echo'<form action="recap_act.php" method="post">
                    <button type="submit" name="soumettre'.$i.'" value="Soumettre">supprimer</button>
                </form>';
                if(isset($_POST['soumettre'.$i])){
                    $sql='DELETE from activite where id_activite='.$tabAct[$i][0];
                    $sth = $bdd->prepare($sql);
                    $sth->execute();
                }
            }
        ?>
    </body>
</html>


