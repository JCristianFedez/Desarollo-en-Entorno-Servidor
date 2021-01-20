<?php 
include_once "Mamifero.php";

class Gato extends Mamifero {

    private $raza;

    public function __construct($s, $r) {
        parent::__construct($s);
        if (isset($r)) {
            $this->raza = $r;
        } else {
            $this->raza = "Egipcio";
        }
    }

    public function __toString() {
        return parent::__toString()."<br>Raza: $this->raza";
    }

    public function maulla() {
        return "Miauuuu";
    }
}
?>