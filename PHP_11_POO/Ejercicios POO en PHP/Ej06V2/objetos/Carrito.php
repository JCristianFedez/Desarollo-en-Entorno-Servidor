<?php 
require_once "TiendaDB.php";
require_once "Producto.php";

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
        WHERE clave_prod='$this->clave_prod'";
        

        $prod = Producto::getProductoByClave($this->clave_prod);
        $prod->reponer($this->cant);
        $conexion->exec($borrado);
    }

    public function update(){
        $conexion = TiendaDB::connectDB();
        $actualizar = "UPDATE carrito
        SET clave_prod='$this->clave_prod',cant='$this->cant'
        WHERE clave_prod='$this->clave_prod'";
        $conexion->exec($actualizar);
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
        $conexion = TiendaDB::connectDB();
        $seleccion = "SELECT clave_prod, cant
        FROM carrito
        WHERE clave_prod='$clave_prod'";
        $consulta = $conexion->query($seleccion);
        $registro = $consulta->fetchObject();
        if(empty($registro)){
            return false;
        }
        $producto = new Carrito($registro->clave_prod, $registro->cant);

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
        $prod = Producto::getProductoByClave($this->clave_prod);
        $prod->vender($cant);
    }

    public function quitar($cant){
        if($cant>$this->cant || $cant<0){
            return false;
        }else{
            $this->cant -= $cant;
        }

        $prod = Producto::getProductoByClave($this->clave_prod);
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
            $prod=Producto::getProductoByClave($carritoProd->getClave());
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