<!--Page racap de lot-->

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


    $requete='SELECT * FROM lots';
    $resultats = $bdd->query($requete) ;
    $tablots=$resultats->fetchAll() ;
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
        <form action="formulaire_lot.php" method="get">
            <button type="submit">Ajouter lot</button>
        </form>
          
        <?php
            for ($i=0; $i<$nblots ; $i++){
                $listlots[$i]= new lots ($tablots[$i][1],$tablots[$i][2]);
                echo'
                <form action="recap_lots.php" method="post">
                    <button type="submit" name="soumettre'.$i.'" value="Soumettre">supprimer</button>
                </form>
                <form action="modif_lots.php" method="get">
                    <button type="submit" name="renvoi" value="'.$tablots[$i][0].'">modifier</button>
                </form>';
                if(isset($_POST['soumettre'.$i])){
                    $sql='DELETE from lots where id_lots='.$tablots[$i][0];
                    $sth = $bdd->prepare($sql);
                    $sth->execute();
                }
            }
        ?>
    </body>
</html>
