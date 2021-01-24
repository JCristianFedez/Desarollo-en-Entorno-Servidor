<?php

class Cubo {

    private $capacidad;
    private $contenido;

    public function __construct($cap,$con){
        $this->capacidad = $cap;
        $this->contenido = (isset($con))?$con:100;
    }

    public function verterEn($cubo){
        if(is_a($cubo, "Cubo")){

            $espacioRestante = $cubo->capacidad-$cubo->contenido;

            if($espacioRestante >= $this->contenido){
                $cubo->contenido += $this->contenido;
                $this->contenido = 0;
            }else{
                $cubo->contenido = $cubo->capacidad;
                $this->contenido -= $espacioRestante;
            }

        }
    }

    public function vertir($cant){
        $espacioRestante = $this->getCapacidad()-$this->getContenido();

        if($espacioRestante<=$cant){
            $this->contenido+=$cant;
        }else{
            $this->contenido = $this->capacidad;
        }
        
    }

    public function getCapacidad(){
        return $this->capacidad;
    }

    public function setCapacidad($capacidad){
        if($this->contenido < $capacidad){
            $this->capacidad = $capacidad;
            return $this;
        }else{
            return false;
        }
    }

    public function getContenido(){
        return $this->contenido;
    }

    public function setContenido($contenido){
        if($this->capacidad > $contenido){
            $this->contenido = $contenido;
            return $this;
        }else{
            return false;
        }
    }
}