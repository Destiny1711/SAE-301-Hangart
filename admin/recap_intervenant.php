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
    
?>
