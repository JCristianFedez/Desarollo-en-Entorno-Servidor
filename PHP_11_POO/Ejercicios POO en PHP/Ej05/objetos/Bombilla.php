<?php

class Bombilla {

    private $estado = "off";
    private $potencia;
    private $ubicacion;
    private static $potenciaTotal = 0;
    private static $fusible = true;

    public function __construct($ubicacion,$potencia){
        $this->ubicacion = $ubicacion;
        $this->potencia = $potencia;
    }

    public function encender(){
        Bombilla::$potenciaTotal += $this->potencia;
        $this->estado = "on";
    }

    public function apagar(){
        Bombilla::$potenciaTotal -= $this->potencia;
        $this->estado = "off";
    }

    public static function bajarFusible(){
        Bombilla::$fusible = "off";
    }

    public static function subirFusible(){
        Bombilla::$fusible = "on";
    }

    public static function getPotenciaTotal(){
        return Bombilla::$potenciaTotal;
    }
    public static function setPotenciaTotal($potencia){
        Bombilla::$potenciaTotal = $potencia;
    }

    /**
     * True = encendida
     */ 
    public function getEstado(){
        if(Bombilla::$fusible == "on"){
            return $this->estado;
        }else{
            return "off";
        }
    }

    public function getPotencia(){
        return $this->potencia;
    }

    public function setPotencia($potencia){
        $this->potencia = $potencia;
        return $this;
    }

    public function getUbicacion(){
        return $this->ubicacion;
    }

    public function setUbicacion($ubicacion){
        $this->ubicacion = $ubicacion;
        return $this;
    }
}