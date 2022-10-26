<?php
    //appel du fichier contenant les differents identifiants pour se connecter a la base de donnee
    include("parametre/parametre.php") ;

    //connexion a la base de donnee
    session_start() ;
    $bdd = new PDO('mysql:host='.$hote.';port='.$port.';dbname='.$nombase,$utilisateur,$mdp);

    $requete='SELECT * FROM intervenant';
    $resultats = $bdd->query($requete) ;
    $tabAct=$resultats->fetchAll() ;
    $resultats->closeCursor() ;

    requete='SELECT * FROM profil';
    $resultats = $bdd->query($requete) ;
    $tabAct=$resultats->fetchAll() ;
    $resultats->closeCursor() ;

    requete='SELECT * FROM activite';
    $resultats = $bdd->query($requete) ;
    $tabAct=$resultats->fetchAll() ;
    $resultats->closeCursor() ;

    requete='SELECT * FROM concours';
    $resultats = $bdd->query($requete) ;
    $tabAct=$resultats->fetchAll() ;
    $resultats->closeCursor() ;

    requete='SELECT * FROM lots';
    $resultats = $bdd->query($requete) ;
    $tabAct=$resultats->fetchAll() ;
    $resultats->closeCursor() ;


    class personne{
        public $nom = "";
        public $prenom = "";

        public function __construct(){

        }
    }


    class profil extends personne {
        public $email = "";
        public $mdp = "";
        public $adresse = "";
        public $telephone = "";

    
        public function __construct($e, $mdp, $a, $tal){
            $this -> nom = $n;
            $this -> prenom = $pr;
            $this -> email = $e;
            $this -> mdp = $mdp;
            $this -> adresse = $a;
            $this -> telephone = $tel;
        }
    }

    class intervenant extends personne{
        public $pays = "";
        public $bio = "";

    
        public function __construct($n, $bio){
            $this -> nom = $n;
            $this -> prenom = $pr;
            $this -> pays = $n;
            $this -> bio = $bio;
        }
    }

    class concours{
        public $nom = "";
        public $horaire = "";

        public function __construct($nom, $h){
            $this -> nom = $n;
            $this -> horaire = $h;
        }
    }

    class lots{
        public $nom = "";
        public $desc = "";

        public function __construct($nom, $d){
            $this -> nom = $n;
            $this -> desc = $d;
        }
    }



?>