<!--Page racap d'intervenant-->

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
    //include("../parametre/parametre.php") ;

    //connexion a la base de donnee
    //$bdd = new PDO('mysql:host='.$hote.';port='.$port.';dbname='.$nombase,$utilisateur,$mdp);

    
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
        // $requete='SELECT * FROM intervenants';
        // $resultats = $bdd->query($requete) ;
        // $tabintervenant=$resultats->fetchAll() ;
        // $resultats->closeCursor() ;
        // $nbintervenant=count($tabintervenant);
    
        // $listintervenant=array();
        //     for ($i=0; $i<$nbintervenant ; $i++){
        //         $listintervenant[$i]= new intervenant ($tabintervenant[$i][1],$tabintervenant[$i][2],$tabintervenant[$i][3],$tabintervenant[$i][4],$tabintervenant[$i][5]);
        //         echo'
        //             <form action="annexe.php?id='.$_GET['id'].'" method="post">
        //                 <button type="submit" name="soumettre'.$i.'" value="Soumettre">supprimer</button>
        //             </form>
        //             <form action="annexe.php?id='.$_GET['id'].'" method="get">
        //                 <button type="submit" name="renvoi" value="'.$i.'">modifier</button>
        //             </form>
        //             ';
                
        //         if(isset($_POST['soumettre'.$i])){
                    
        //             $sql='DELETE FROM intervenants WHERE id_intervenants='.$tabintervenant[$i][0];
        //             $sth = $bdd->prepare($sql);
        //             $sth->execute();
        //         }
        //     }
        ?>
    </body>
</html>