<?php 
include_once "Animal.php";

class Ave extends Animal{

    public function __construct($s){
        parent::__construct($s);
    }

    public function vuela(){
        return "Estoy volando";
    }

    public function ponHuebo(){
        if($this->getSexo() == "macho"){
            return "No pongo huevos sorry";
        }else{
            return "Hay va una docena";
        }
    }
}
?>