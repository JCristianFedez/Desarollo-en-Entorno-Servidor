<?php 
class Zona {

    private $entradaDisponible;
    private $nombre;

    public function __construct($nombre,$entradaDisponible){
        $this->nombre = $nombre;
        $this->entradaDisponible = $entradaDisponible;
    }

    public function venderEntrada($cant){
        if($cant>$this->entradaDisponible){
            return -1;
        }else{
            $this->entradaDisponible-=$cant;
            return $this->entradaDisponible;
        }
    }

    public function getNombre(){
        return $this->nombre;
    }

    public function getEntradasDisponibles(){
        return $this->entradaDisponible;
    }

}