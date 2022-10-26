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

    $requete='SELECT * FROM intervenants';
    $resultats = $bdd->query($requete) ;
    $tabintervenant=$resultats->fetchAll() ;
    $resultats->closeCursor() ;
    $nbintervenant=count($tabintervenant);



    
    $listintervenant=array();
    for ($i=0; $i<$nbintervenant; $i++){
        $listintervenant[$i]= new intervenant ($tabintervenant[$i][1],$tabintervenant[$i][2],$tabintervenant[$i][3],$tabintervenant[$i][4],$tabintervenant[$i][5]);
    }


?>