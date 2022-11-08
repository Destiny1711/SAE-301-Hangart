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
            echo'
            <div class="recap"><b>NOM DE L\'ACTIVITÉ :</b> '.$this->nom.' <b>DATE DE L\'ACTIVITÉ :</b> '.$this->date.' <b>HORAIRES DE L\'ACTIVITÉ :</b> '.$this->horaire.'</div>';
        }
    }
?>

