<?php
if(session_status() == PHP_SESSION_NONE){
    session_start();
}

if(!isset($_SESSION["cocheCaroEjAdicional"]["precio"])){
    $_SESSION["cocheCaroEjAdicional"]["precio"] = 0;
}

if(!isset($_SESSION["cocheCaroEjAdicional"]["modelo"])){
    $_SESSION["cocheCaroEjAdicional"]["modelo"] = "";
}

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
            $_SESSION["cocheCaroEjAdicional"]["modelo"] = Coche::$modeloCaro;
            $_SESSION["cocheCaroEjAdicional"]["precio"] = Coche::$precioCaro;
        }
    }

    public static function masCaro(){
        if(Coche::$modeloCaro == ""){
            Coche::$modeloCaro = $_SESSION["cocheCaroEjAdicional"]["modelo"];
        }
        if(Coche::$precioCaro == ""){
            Coche::$precioCaro = $_SESSION["cocheCaroEjAdicional"]["precio"];
        }
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
        Coche::$precioCaro = $_SESSION["cocheCaroEjAdicional"]["precio"];
        $this->modelo = $modelo;
        if(Coche::$precioCaro < $this->$precio){
            Coche::$precioCaro = $this->$precio;
            Coche::$modeloCaro = $this->$modelo;
            $_SESSION["cocheCaroEjAdicional"]["modelo"] = Coche::$modeloCaro;
            $_SESSION["cocheCaroEjAdicional"]["precio"] = Coche::$precioCaro;
        }
        return $this;
    }

    public function getPrecio(){
        return $this->precio;
    }

    public function setPrecio($precio){
        Coche::$precioCaro = $_SESSION["cocheCaroEjAdicional"]["precio"];

        $this->precio = $precio;
        if(Coche::$precioCaro < $this->$precio){
            Coche::$precioCaro = $this->$precio;
            Coche::$modeloCaro = $this->$modelo;
            $_SESSION["cocheCaroEjAdicional"]["modelo"] = Coche::$modeloCaro;
            $_SESSION["cocheCaroEjAdicional"]["precio"] = Coche::$precioCaro;
        }
        return $this;
    }

    public static function getModeloCaro(){
        Coche::$modeloCaro = $_SESSION["cocheCaroEjAdicional"]["modelo"];
        return Coche::$modeloCaro;
    }

    public static function setModeloCaro($modelo){
        Coche::$modeloCaro = $modelo;
        return Coche::$modeloCaro;
    }
    
    public static function getPrecioCaro(){
        Coche::$precioCaro = $_SESSION["cocheCaroEjAdicional"]["precio"];
        return Coche::$precioCaro;
    }

    public static function setPrecioCaro($precio){
        Coche::$precioCaro = $precio;
        return Coche::$precioCaro;
    }
}