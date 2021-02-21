<?php session_start();?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
<?php
if (isset($_SESSION["carrito"]) && isset($_POST["pagar"])) {
    
    $fichero = fopen("factura.txt", "w");
    fputs($fichero,"FACTURA DE COMPRA ".PHP_EOL.PHP_EOL);
    fputs($fichero, "CODIGO \t DESCRIPCION \t\t\t PRECIO \t PRECIO CON IVA". PHP_EOL);
    $iva=0;
    foreach ($_SESSION["carrito"] as $carro) {
        $registro=extraerRegistro($carro);
        $iva+=$registro->precio_venta*1.21;
        $linea=$registro->codigo."\t ".$registro->descripcion."\t\t ".$registro->precio_venta."\t\t ".$registro->precio_venta*1.21;
        fputs($fichero,$linea.PHP_EOL);
    }
    fputs($fichero, PHP_EOL."total a pagar iva incluido: ");
    fputs($fichero,$iva.PHP_EOL);
    fclose($fichero);

    session_destroy();
}else{
    header('Location: ejercicio2.php');
}
?>
<h1>Factura emitida</h1><br>
<a href="ejercicio2.php">pagina principal</a>
    
</body>
</html>
<?php 
function extraerRegistro($codigo){
    try {
        $conexion = new PDO("mysql:host=localhost;dbname=gestisimal;charset=utf8", "root", "");
    } catch (PDOException $e) {
        echo "No se ha podido establecer conexión con el servidor de bases de datos.<br>";
        die("Error: " . $e->getMessage());
    }
    $productos_consulta = $conexion->query("select * from productos where codigo=".$codigo);
    $registro = $productos_consulta->fetchObject();
    return $registro;
}
?>

