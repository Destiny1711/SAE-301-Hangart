<!--Page racap de lot-->
<?php
    class lots{
        public $nom = "";
        public $desc = "";
        public function __construct($nom, $d){
            $this -> nom = $nom;
            $this -> desc = $d;
            echo'
            <div class="recap"><b>NOM DU LOT :</b> '.$this->nom.' <b>DESCRIPTION DU LOT :</b> '.$this->desc.'</div>';
        }
    }  
?>
