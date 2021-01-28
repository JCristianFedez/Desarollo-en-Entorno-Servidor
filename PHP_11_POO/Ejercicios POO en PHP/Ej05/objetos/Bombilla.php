<?php
if(session_status() == PHP_SESSION_NONE){
    session_start();
}

if(!isset($_SESSION["potenciaTotalEj05"])){
    $_SESSION["potenciaTotalEj05"]=0;
}

if(!isset($_SESSION["fusibleEj05"])){
    $_SESSION["fusibleEj05"] = true;
}

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
        $_SESSION["potenciaTotalEj05"] += $this->potencia;

        $this->estado = "on";
    }

    public function apagar(){
        Bombilla::$potenciaTotal -= $this->potencia;
        $_SESSION["potenciaTotalEj05"] -= $this->potencia;
        $this->estado = "off";
    }

    public static function bajarFusible(){
        Bombilla::$fusible = false;
        $_SESSION["fusibleEj05"] = Bombilla::$fusible;
    }

    public static function subirFusible(){
        Bombilla::$fusible = true;
        $_SESSION["fusibleEj05"] = true;

    }

    public static function getPotenciaTotal(){
        Bombilla::$fusible = $_SESSION["fusibleEj05"];
        if(Bombilla::$fusible){
            Bombilla::$potenciaTotal = $_SESSION["potenciaTotalEj05"];
            return Bombilla::$potenciaTotal;
        }else{
            return 0;
        }

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