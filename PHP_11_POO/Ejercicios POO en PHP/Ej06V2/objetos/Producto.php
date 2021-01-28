<?php
require_once "TiendaDB.php";

class Producto {

    private $clave;
    private $nombre;
    private $precio;
    private $imagen;
    private $url_local;
    private $stock;

    public function __construct($clave,$nombre,$precio,$imagen,$url_local,$stock){
        $this->clave = $clave;
        $this->nombre = $nombre;
        $this->precio = $precio;
        $this->imagen = $imagen;
        $this->url_local = $url_local;
        $this->stock = $stock;
    }

    public function insert(){
        $conexion = TiendaDB::connectDB();
        $insercion = "INSERT INTO productos (nombre,precio,imagen,url_local,stock)
        VALUES ('$this->nombre','$this->precio','$this->imagen','$this->url_local','$this->stock')";
        $conexion->exec($insercion);
    }

    public function delete(){
        $conexion = TiendaDB::connectDB();
        $borrado = "DELETE FROM productos
        WHERE clave='$this->clave'";
    }

    public static function getProductos(){
        $conexion = TiendaDB::connectDB();
        $seleccion = "SELECT clave, nombre, precio, stock, imagen, url_local
        FROM productos";
        $consulta = $conexion->query($seleccion);

        $productos = [];

        while($prod = $consulta->fetchObject()){
            $productos[] = new Producto(
                $prod->clave, $prod->nombre,
                $prod->precio,$prod->imagen,
                $prod->url_local,$prod->stock
            );
        }
        return $productos;
    }

    public static function getProductoByClave($clave){
        $conexion = TiendaDB::connectDB();
        $seleccion = "SELECT clave, nombre, precio, stock, imagen, url_local
        FROM productos
        WHERE clave='$clave'";
        $consulta = $conexion->query($seleccion);
        $registro = $consulta->fetchObject();

        $producto = new Producto(
            $registro->clave, $registro->nombre,
            $registro->precio,$registro->imagen,
            $registro->url_local,$registro->stock
        );

        return $producto;
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