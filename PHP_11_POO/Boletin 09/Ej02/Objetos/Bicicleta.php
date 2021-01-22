<?php 
include_once "Vehiculo.php";

class Bicicleta extends Vehiculo{

    private $platos;

    public function  __construct($marca,$platos){
        parent::__construct($marca);
        $this->platos=(isset($platos))?$platos:3;
    }

    public function hazCaballito(){
        return "YEPAAAAAAAAAA";
    }
    
    public function getPlatos(){
        return $this->platos;
    }
}

?>