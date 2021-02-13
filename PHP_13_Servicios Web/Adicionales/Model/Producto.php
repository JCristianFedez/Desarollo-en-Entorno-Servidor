<?php 
require_once "TiendaDB.php";

class Producto{

    /**
     * Retorno un array con los productos que contengan en su nombre 
     * $nombre
     */
    public static function getProductosByNombre($nombre){
        $conexion = TiendaDB::connectDB();
        $seleccion = 
        "SELECT 
            id,nombre,precio,stock,img
        FROM 
            producto
        WHERE 
            nombre LIKE '%$nombre%'";
        
        $consulta = $conexion->query($seleccion);

        $productos=[];
        
        while($prod = $consulta->fetchObject()){
            $productos[] =[
                "Id" => $prod->id,
                "Nombre" => $prod->nombre,
                "Precio" => $prod->precio,
                "Stock" => $prod->stock,
                "Img" => $prod->img
            ];
        }

        return $productos;
    }

    /**
     * Retorno un array de los productos que tengan
     * un precio menor a $min y menor a $max
     */
    public static function getProductosByRangoPrecio($min,$max){
        $conexion = TiendaDB::connectDB();
        $seleccion = 
        "SELECT 
            id,nombre,precio,stock,img
        FROM 
            producto
        WHERE 
            precio >= '$min'
        AND 
            precio <= '$max'";
        
        $consulta = $conexion->query($seleccion);

        $productos=[];
        
        while($prod = $consulta->fetchObject()){
            $productos[] =[
                "Id" => $prod->id,
                "Nombre" => $prod->nombre,
                "Precio" => $prod->precio,
                "Stock" => $prod->stock,
                "Img" => $prod->img
            ];
        }

        return $productos;
    }

    /**
     * Retorno los productos que contengan en su nombre
     * $nombre y que tengan un precio menor a $min y 
     * mayor a $max
     */
    public static function getProductosByNombreYRango($nombre,$min,$max){
        $conexion = TiendaDB::connectDB();
        $seleccion = 
        "SELECT 
            id,nombre,precio,stock,img
        FROM 
            producto
        WHERE 
            precio >= '$min'
        AND 
            precio <= '$max'
        AND 
            nombre LIKE '%$nombre%'";
        
        $consulta = $conexion->query($seleccion);

        $productos=[];
        
        while($prod = $consulta->fetchObject()){
            $productos[] =[
                "Id" => $prod->id,
                "Nombre" => $prod->nombre,
                "Precio" => $prod->precio,
                "Stock" => $prod->stock,
                "Img" => $prod->img
            ];
        }

        return $productos;
    }
}
?>