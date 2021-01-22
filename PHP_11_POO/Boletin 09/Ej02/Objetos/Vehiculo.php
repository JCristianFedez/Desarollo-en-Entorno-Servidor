<?php 

abstract class Vehiculo {

    private static $kmTotales = 0;
    private static $cantVehiculos = 0;
    private $marca;
    private $kmRecorridos;

    public function __construct($marca){
        $this->marca=(isset($marca))?$marca:"Seat";
        $this->kmRecorridos = 0;
        Vehiculo::$cantVehiculos++;
    }

    public function recorre($km) {
        $this->kmRecorridos += $km;
        Vehiculo::$kmTotales += $km;
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

    public function getMarca(){
        return $this->marca;
    }
}

?>