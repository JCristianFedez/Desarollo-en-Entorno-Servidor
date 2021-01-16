<?php 
try{
    $conexion=new PDO("mysql:host=localhost;dbname=ej04_boletin_almacen","root","");
}catch(PDOException $e){
    echo "<h3>Ups no se ha podido conectar con el servidor</h3>";
    die("Error: ".$e->getMessage());
}
?>