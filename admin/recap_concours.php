<!--Page racap de concours-->
<?php
    class concours{
        public $nom = "";
        public $horaire = "";
        public function __construct($n, $h){
            $this -> nom = $n;
            $this -> horaire = $h;
            echo'
            <div class="recap"><b>NOM DU CONCOURS :</b> '.$this->nom.' <b>HORAIRES DU CONCOURS :</b> '.$this->horaire.'</div>';
        }
    }
?>