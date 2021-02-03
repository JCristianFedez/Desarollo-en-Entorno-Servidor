<?php 
require_once "TiendaDB.php";

class Producto{

    private $id;
    private $nombre;
    private $precio;
    private $stock;
    private $img;

    public function __construct($id="",$nombre="",$precio="",$stock="",$img=""){
        $this->id = $id;
        $this->nombre = $nombre;
        $this->precio = $precio;
        $this->stock = $stock;
        $this->img = $img;
    }

    public function insert(){
        $conexion = TiendaDB::connectDB();
        $inserccion = "INSERT INTO producto (nombre,precio,stock,img)
        VALUES ('$this->nombre','$this->precio','$this->stock','$this->img');";
        $conexion->exec($inserccion);   
    }

    public function delete(){
        $conexion = TiendaDB::connectDB();
        $borrado = "DELETE FROM producto
        WHERE id='$this->id'";
        $conexion->exec($borrado);
    }

    public function update(){
        $conexion = TiendaDB::connectDB();
        $actualizar = "UPDATE producto
        SET nombre='$this->nombre',
            precio='$this->precio',
            stock='$this->stock',
            img='$this->img'
        WHERE id='$this->id'";
        $conexion->exec($actualizar);
    }

    public static function getProductos(){
        $conexion = TiendaDB::connectDB();
        $seleccion = "SELECT * FROM producto";
        $consulta = $conexion->query($seleccion);

        $productos=[];
        
        while($prod = $consulta->fetchObject()){
            $productos[] = new Producto(
                $prod->id,
                $prod->nombre,
                $prod->precio,
                $prod->stock,
                $prod->imagen
            );
        }

        return $productos;
    }

    public function getProductoById($id){
        $conexion = TiendaDB::connectDB();
        $seleccion = "SELECT * FROM producto WHERE id='$id'";
        $consuta = $conexion->query($seleccion);
        $registro = $consulta->fetchObject();

        if(empty($registro)){
            return false;
        }

        $producto = new Producto(
            $prod->id,
            $prod->nombre,
            $prod->precio,
            $prod->stock,
            $prod->imagen
        );
        return $producto;
    }

    public function reponer($cant){
        if($cant<0){
            return false;
        }else{
            $this->stock += $cant;
        }
        $this->update();
    }

    public function vender($cant){
        if($cant>$this->stock || $cant<0){
            return false;
        }else{
            $this->stock -= $cant;
        }
        $this->update();
    }

    public function getId(){
        return $this->id;
    }

    public function setId($id){
        $this->id = $id;
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

    public function getImg(){
        return $this->img;
    }

    public function setImg($img){
        $this->img = $img;
        return $this;
    }
}
?>