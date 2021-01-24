<?php

class Empleado {

    private $nombre;
    private $sueldo;

    public function __construct($nombre,$sueldo){
        $this->nombre = $nombre;
        $this->sueldo = $sueldo;
    }

    public function asigna($nombre,$sueldo){
        $this->nombre = $nombre;
        $this->sueldo = $sueldo;
    }

    public function pagaImpuestos(){
        if($this->sueldo > 3000){
            return $this->nombre." paga impuestos";
        }else{
            return $this->nombre." no paga impuestos";
        }
    }
}