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
            echo'
            <div class="recap"><b>NOM DE L\'INTERVENANT :</b> '.$this->nom.' <b>PRENOM DE L\'INTERVENANT :</b> '.$this->prenom.' <b>PAYS DE L\'INTERVENANT :</b> '.$this->pays.'<br><b> BIOGRAPHIE :</b> '.$this->bio.'</div>';
        }
    } 
?>
