<?php 
require_once "TiendaDB.php";

class Cliente{

    /**
     * Return peticiones echas con dicho tocken
     */
    public static function getPeticiones($token){
        $conexion = TiendaDB::connectDB();

        $seleccion = 
        "SELECT 
            peticiones 
        FROM 
            cliente 
        WHERE
            token='$token'";

        $consulta = $conexion->query($seleccion);
        $registro = $consulta->fetchObject();

        if(empty($registro)){
            return false;
        }

        $cant = $registro->peticiones;

        return $cant;
    }

    /**
     * Aumenta en 1 las peticiones de dicho token
     */
    public static function peticionRealizada($token){
        $conexion = TiendaDB::connectDB();

        $cant = self::getPeticiones($token);
        $cant++;

        $actualizar = 
        "UPDATE 
            cliente
        SET
            peticiones='$cant'
        WHERE
            token='$token'";
        $conexion->exec($actualizar);
        
        return $cant;
    }

    /**
     * Comprueba que exista el token
     */
    public static function tokenExist($token){
        $conexion = TiendaDB::connectDB();

        $seleccion = 
        "SELECT 
            * 
        FROM 
            cliente 
        WHERE
            token='$token'";

        $consulta = $conexion->query($seleccion);
        $registro = $consulta->fetchObject();

        if(empty($registro)){
            return false;
        }

        return true;
    }

}
?>