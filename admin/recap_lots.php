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
    for ($i=0; $i<$nblots; $i++){
        $listlots[$i]= new lots ($tablots[$i][1],$tablots[$i][2]);

    }
    
?>