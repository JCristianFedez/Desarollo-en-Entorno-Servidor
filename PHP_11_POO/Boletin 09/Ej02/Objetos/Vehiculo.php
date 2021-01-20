<?php 

class Vehiculo {

    private static $kmTotales = 0;
    private static $cantVehiculos = 0;
    private $marca;
    private $kilometros;

    public function __construct($marca){
        $this->marca=(isset($marca))?$marca:"Seat";
        $this->kilometros = 0;
        $cantVehiculos++;
    }

    public function getVehiculosCreados(){
        return Vehiculo::$cantVehiculos;
    }

    public function getKmTotales(){
        return Vehiculo::$kmTotales;
    }

    public function getKmRecorridos() {
        return $this->kmRecorridos;
    }
    
    public function recorre($km) {
        $this->kmRecorridos += $km;
        Vehiculo::$kmTotales += $km;
    }

}

?>