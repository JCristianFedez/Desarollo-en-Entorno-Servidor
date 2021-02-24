<?php 

abstract class BibliotecaDB{
    
    private static $server = "localhost";
    private static $db = "biblioteca";
    private static $user = "root";
    private static $password = "";
    private static $options = [PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8'];

    public static function connectDB(){

        try{
            $connection = new PDO("mysql:host=".self::$server.";dbname=".self::$db.";charset=utf8", self::$user, self::$password,self::$options);
        }catch(PDOException $e){
            echo "<h3>Ups no se ha podido conectar con el servidor</h3>";
            die("Error: ".$e->getMessage());
        }
        return $connection;

    }

}
?>