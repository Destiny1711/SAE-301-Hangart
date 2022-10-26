<?php

    class activite{
        public $nom = "";
        public $date = "";
        public $horaire = "";

        public function __construct($n,$d,$h){
            $this -> nom = $n;
            $this -> date = $d;
            $this -> horaire = $h;
            echo'<brnom:'.$this->nom.' date:'.$this->date.'  horaire:'.$this->horaire;
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
    for ($i=0; $i<$nbact; $i++){
        $listactivite[$i]= new activite ($tabAct[$i][1],$tabAct[$i][2],$tabAct[$i][3]);

    }
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
        <form method="POST" action="recap_act.php" enctype="multipart/form-data">  

                <div class="formulaire" >
                    <p>
                        <input type="submit" name="soumettre" value="Soumettre">
                    </p>

                </div>
        </form>
    </body>
</html>

<?php
        //recuperation donnée lot
        if (isset($_POST['soumettre'])) {
            
        }
?>