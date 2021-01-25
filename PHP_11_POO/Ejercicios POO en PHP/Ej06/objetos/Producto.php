<?php

class Producto {

    private $clave;
    private $nombre;
    private $precio;
    private $stock;
    private $imagen;
    private $url_local;

    public function __construct($clave,$nombre,$precio,$stock,$imagen,$url_local){
        $this->clave = $clave;
        $this->nombre = $nombre;
        $this->precio = $precio;
        $this->stock = $stock;
        $this->imagen = $imagen;
        $this->url_local = $url_local;
    }

    public function reponer($cant){
        if($cant<0){
            return false;
        }else{
            $this->stock += $cant;
        }
    }

    public function vender($cant){
        if($cant>$this->stock || $cant<0){
            return false;
        }else{
            $this->stock -= $cant;
        }
    }


    public function getClave(){
        return $this->clave;
    }

    public function setClave($clave){
        $this->clave = $clave;
        return $this;
    }

    public function getNombre(){
        return $this->nombre;
    }

    public function setNombre($nombre){
        $this->nombre = $nombre;

        return $this;
    }

    public function getPrecio(){
        return $this->precio;
    }

    public function setPrecio($precio){
        $this->precio = $precio;
        return $this;
    }

    public function getStock(){
        return $this->stock;
    }

    public function setStock($stock){
        $this->stock = $stock;
        return $this;
    }

    public function getUrl_local(){
        return $this->url_local;
    }

    public function setUrl_local($url_local){
        $this->url_local = $url_local;
        return $this;
    }

    public function getImagen(){
        return $this->imagen;
    }

    public function setImagen($imagen){
        $this->imagen = $imagen;
        return $this;
    }
}