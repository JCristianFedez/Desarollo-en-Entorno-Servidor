<?php

include_once "Vehiculo.php";

class Coche extends Vehiculo {

    private $puertas;

    public function __construct($marca,$puertas){
        parent::__construct($marca);
        $this->puertas=(isset($puertas))?$puertas:5;

    }

    public function quemaRueda(){
        return "BRRRR";
    }

    public function getPuertas(){
        return $this->puertas;
    }
}

?>