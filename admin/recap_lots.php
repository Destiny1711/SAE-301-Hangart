<!--Page racap de lot-->

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

    
?>
