<?php 
require_once "TiendaDB.php";

class Carrito {

    private $clave_prod;
    private $cant;

    public function __construct($clave_prod,$cant){
        $this->clave_prod = $clave_prod;
        $this->cant = $cant;
    }

    public function insert(){
        $conexion = TiendaDB::connectDB();
        $insercion = "INSERT INTO carrito (clave_prod,cant)
        VALUES ('$this->clave_prod','$this->cant')";
        $conexion->exec($insercion);
    }

    public function delete(){
        $conexion = TiendaDB::connectDB();
        $borrado = "DELETE FROM carrito
        WHERE clave='$this->clave_prod'";
    }

    public static function getFullCarrito(){
        $conexion = TiendaDB::connectDB();
        $seleccion = "SELECT clave_prod, cant
        FROM carrito";
        $consulta = $conexion->query($seleccion);

        $productos = [];

        while($prod = $consulta->fetchObject()){
            $productos[] = new Carrito(
                $prod->clave_prod, $prod->cant);
        }

        return $productos;
    }

    public static function getProdCarritoByClave($clave_prod){
        $conexion = TiendaDB::connectDB;
        $seleccion = "SELECT clave_prod, cant
        FROM carrito
        WHERE clave_prod='$clave_prod'";
        $consulta = $conexion->query($seleccion);
        $registro = $consulta->fetchObject();

        $producto = new Carrito($registro->clave_prod, $registro->cant);

        return $productos;
    }

    public static function getCantTotal(){
        $productos = Carrito::getFullCarrito();
        $total = 0;
        foreach ($productos as $producto) {
            $total += $producto->getCant();
        }
        return $total;
    }

    public function agregar($cant){
        if($cant<0){
            return false;
        }else{
            $this->cant += $cant;
        }
    }

    public function quitar($cant){
        if($cant>$this->cant || $cant<0){
            return false;
        }else{
            $this->cant -= $cant;
        }
    }

    public function getClave(){
        return $this->clave_prod;
    }

    public function setClave($clave_prod){
        $this->clave_prod = $clave_prod;
        return $this;
    }

    public function getCant(){
        return $this->cant;
    }

    public function setCant($cant){
        $this->cant = $cant;

        return $this;
    }

}
?>