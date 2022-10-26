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


    $requete='SELECT * FROM concours';
    $resultats = $bdd->query($requete) ;
    $tabconcours=$resultats->fetchAll() ;
    $resultats->closeCursor() ;
    $nbconcours=count($tabconcours);


    $listconcours=array();
    for ($i=0; $i<$nbconcours; $i++){
        $listconcours[$i]= new concours ($tabconcours[$i][1],$tabconcours[$i][2]);
    }
    
?>