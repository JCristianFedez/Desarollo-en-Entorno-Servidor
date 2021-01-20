<?php 

include_once "Ave.php";

class Pinguino extends Ave {

    public function __construct($s){
        parent::__construct($s);
    }

    public function vuela() {
        return "QUE GRACIOSO, EL PINGUINO SE HA METIDO DE TO Y NO PUEDE VOLA";
    }
}

?>