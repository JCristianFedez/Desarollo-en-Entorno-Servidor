<?php 
require_once "TiendaDB.php";
require_once "Producto.php";

class Carrito {

    private $idProd;
    private $cant;

    public function __construct($idProd,$cant){
        $this->idProd = $idProd;
        $this->cant = $cant;
    }

    public function insert(){
        $conexion = TiendaDB::connectDB();
        $insercion = "INSERT INTO carrito (idProd,cant)
        VALUES ('$this->idProd','$this->cant')";
        $conexion->exec($insercion);
    }

    public function delete(){
        $conexion = TiendaDB::connectDB();
        $borrado = "DELETE FROM carrito
        WHERE idProd='$this->idProd'";
        

        $prod = Producto::getProductoById($this->idProd);
        $prod->reponer($this->cant);
        $conexion->exec($borrado);
    }

    public function update(){
        $conexion = TiendaDB::connectDB();
        $actualizar = "UPDATE carrito
        SET idProd='$this->idProd',cant='$this->cant'
        WHERE idProd='$this->idProd'";
        $conexion->exec($actualizar);
    }

    public static function getFullCarrito(){
        $conexion = TiendaDB::connectDB();
        $seleccion = "SELECT idProd, cant
        FROM carrito";
        $consulta = $conexion->query($seleccion);

        $productos = [];

        while($prod = $consulta->fetchObject()){
            $productos[] = new Carrito(
                $prod->idProd, $prod->cant);
        }

        return $productos;
    }

    public static function getProdCarritoById($idProd){
        $conexion = TiendaDB::connectDB();
        $seleccion = "SELECT idProd, cant
        FROM carrito
        WHERE idProd='$idProd'";
        $consulta = $conexion->query($seleccion);
        $registro = $consulta->fetchObject();
        if(empty($registro)){
            return false;
        }
        $producto = new Carrito($registro->idProd, $registro->cant);

        return $producto;
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
        $this->update();
        $prod = Producto::getProductoById($this->idProd);
        $prod->vender($cant);
    }

    public function quitar($cant){
        if($cant>$this->cant || $cant<0){
            return false;
        }else{
            $this->cant -= $cant;
        }

        $prod = Producto::getProductoById($this->idProd);
        $prod->reponer($cant);

        if($this->cant == 0){
            $this->delete();
        }else{
            $this->update();
        }
    }

    public static function vaciarCarrito(){
        $conexion = TiendaDB::connectDB();

        $allCarrito = Carrito::getFullCarrito();
        foreach ($allCarrito as $codigo => $carritoProd) {
            $prod=Producto::getProductoById($carritoProd->getId());
            $prod->reponer($carritoProd->getCant());
        }

        $vaciarCarrito = "TRUNCATE TABLE carrito";
        $conexion->exec($vaciarCarrito);
    }

    public static function realizarCompra(){
        $conexion = TiendaDB::connectDB();
        $vaciarCarrito = "TRUNCATE TABLE carrito";
        $conexion->exec($vaciarCarrito);
    }

    public function getIdProd(){
        return $this->idProd;
    }

    public function setIdProd($idProd){
        $this->idProd = $idProd;
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