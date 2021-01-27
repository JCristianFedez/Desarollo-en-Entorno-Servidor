<?php

class Coche {

    private $matricula;
    private $modelo;
    private $precio;
    private static $modeloCaro = "";
    private static $precioCaro = 0;

    public function __construct($matricula,$modelo,$precio){
        $this->matricula = $matricula;
        $this->modelo = $modelo;
        $this->precio = $precio;

        if(Coche::$precioCaro < $precio){
            Coche::$precioCaro = $precio;
            Coche::$modeloCaro = $modelo;
        }
    }

    public static function masCaro(){
        $str = "Modelo mas caro: ".Coche::$modeloCaro.
        " con un precio de ".Coche::$precioCaro." €";
        return $str;
    }

    public function __toString(){
        $str = "<td>$this->matricula</td>";
        $str = "<td>$this->modelo</td>";
        $str = "<td>$this->precio</td>";
    }

    public function getMatricula(){
        return $this->matricula;
    }

    public function setMatricula($matricula){
        $this->matricula = $matricula;
        return $this;
    }

    public function getModelo(){
        return $this->modelo;
    }

    public function setModelo($modelo){
        $this->modelo = $modelo;
        if(Coche::$precioCaro < $this->precio){
            Coche::$precioCaro = $this->precio;
            Coche::$modeloCaro = $this->modelo;
        }
        return $this;
    }

    public function getPrecio(){
        return $this->precio;
    }

    public function setPrecio($precio){
        $this->precio = $precio;
        if(Coche::$precioCaro < $this->precio){
            Coche::$precioCaro = $this->precio;
            Coche::$modeloCaro = $this->modelo;
        }
        return $this;
    }

    public static function getModeloCaro(){
        return Coche::$modeloCaro;
    }

    public static function setModeloCaro($modelo){
        Coche::$modeloCaro = $modelo;
        return Coche::$modeloCaro;
    }
    
    public static function getPrecioCaro(){
        return Coche::$precioCaro;
    }

    public static function setPrecioCaro($precio){
        Coche::$precioCaro = $precio;
        return Coche::$precioCaro;
    }
}