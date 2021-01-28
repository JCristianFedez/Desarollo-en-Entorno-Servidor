<?php 
abstract class TiendaDB{
    private static $server = "localhost";
    private static $db = "tienda-objetosV2";
    private static $user = "root";
    private static $password = "";

    public static function connectDB(){

        try{
            $connection = new PDO("mysql:host=".self::$server.";dbname=".self::$db.";charset=utf8", self::$user, self::$password);
        }catch(PDOException $e){
            echo "<h3>Ups no se ha podido conectar con el servidor</h3>";
            die("Error: ".$e->getMessage());
        }
        return $connection;
    }
}
?>