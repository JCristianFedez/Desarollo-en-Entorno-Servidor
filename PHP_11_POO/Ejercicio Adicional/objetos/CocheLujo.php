<?php

include_once "Coche.php";

class CocheLujo extends Coche{

    private $matricula;
    private $modelo;
    private $precio;
    private $suplemento;

    public function __construct($matricula,$modelo,$precio,$suplemento){
        parent::__construct($matricula,$modelo,$precio);
        $this->suplemento = $suplemento;
    }

    public function getPrecioBase(){
        return parent::getPrecio();
    }

    public function getPrecio(){
        return parent::getPrecio() + $this->suplemento;
    }

    public function toString(){
        $str = parent::__toString();
        $str = "<td>$this->suplemento</td>";
    }

    public function getSuplemento(){
        return $this->suplemento;
    }

    public function setSuplemento($suplemento){
        $this->suplemento = $suplemento;
        return $this;
    }
}